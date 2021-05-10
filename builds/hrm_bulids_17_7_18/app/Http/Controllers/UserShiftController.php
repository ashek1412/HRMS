<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\UserShiftRequest;
use Entrust;
use App\UserShift;

Class UserShiftController extends Controller{
    use BasicController;


    protected $form = 'user-shift-form';

    public function accessible($user){
        if(!$user)
            return ['message' => trans('messages.invalid_link'),'status' => 'error'];

        if(!$this->userAccessible($user))
            return ['message' => trans('messages.permission_denied'),'status' => 'error'];
        else
            return ['status' => 'success'];
    }

    public function lists(Request $request){
        $user = \App\User::with(array(
            'userShift' => function ($query) {
                $query->orderBy('from_date', 'asc');
            }
        ))->find($request->input('id'));

        $accessible = $this->accessible($user);

        //$ushift=getDailyShift("2018-7-1", "2018-7-20",$request->input('id'));

        if($accessible['status'] != 'success')
            return;

        return view('user_shift.list',compact('user'))->render();
    }

    public function create($user_id){
        $user = \App\User::find($user_id);

        if(!$user)
            return view('global.error',['message' => trans('messages.invalid_link')]);

        $accessible = $this->accessible($user);
        
        if($accessible['status'] != 'success')
            return view('global.error',['message' => $accessible['message']]);

        if(!Entrust::can('edit-user')&& !Entrust::can('update-shift'))
            return view('global.error',['message' => trans('messages.permission_denied')]);

        $shifts = \App\Shift::all()->pluck('name','id')->all();
        $shifts_details=\App\Shift::all();
        $rows = array();

        foreach($shifts_details as $shift){
            $row = array(
                $shift->name
            );
            foreach($shift->ShiftDetail as $shift_detail)
                array_push($row,($shift_detail->day.'#'.showTime($shift_detail->in_time).' '.trans('messages.to').' '.showTime($shift_detail->out_time)));
            $rows[] = $row;
        }
        return view('user_shift.create',compact('shifts','shifts_details','user','rows'));
    }

    public function show(UserShift $user_shift){
        $user = $user_shift->User;

        $accessible = $this->accessible($user);
        
        if($accessible['status'] != 'success')
            return view('global.error',['message' => $accessible['message']]);

        $custom_fields = \App\CustomField::whereForm($this->form)->get();

        $col_ids = getCustomColId($this->form);
        $values = fetchCustomValues($this->form);
        return view('user_shift.show',compact('user','user_shift','values','col_ids','custom_fields'));
    }

    public function edit(UserShift $user_shift){
        $user = $user_shift->User;

        $accessible = $this->accessible($user);
        
        if($accessible['status'] != 'success')
            return view('global.error',['message' => $accessible['message']]);

        if(!Entrust::can('edit-user') && !Entrust::can('update-shift'))
            return view('global.error',['message' => trans('messages.permission_denied')]);

        $s_details=\App\Shift::all();
        $rows = array();

        foreach($s_details as $shift){
            $row = array(
                $shift->name
            );

            foreach($shift->ShiftDetail as $shift_detail)
                array_push($row,($shift_detail->day.'#'.showTime($shift_detail->in_time).' '.trans('messages.to').' '.showTime($shift_detail->out_time)));
            $rows[] = $row;
        }


        $shifts = \App\Shift::all()->pluck('name','id')->all();
        $shifts_details=\App\ShiftDetail::all();


        $custom_user_shift_field_values = getCustomFieldValues($this->form,$user_shift->id);
        $in_time = isset($user_shift->in_time) ? date('h:iA',strtotime($user_shift->in_time)) : '';
        $out_time = isset($user_shift->out_time) ? date('h:iA',strtotime($user_shift->out_time)) : '';
        
        return view('user_shift.edit',compact('user_shift','custom_user_shift_field_values','shifts','shifts_details','in_time','out_time','rows'));
    }

    public function store(UserShiftRequest $request, $user_id){

        $validation = validateCustomField($this->form,$request);

        //dd($user_id);
        if($validation->fails())
            return response()->json(['message' => $validation->messages()->first(), 'status' => 'error']);

        $user = \App\User::find($user_id);

        $accessible = $this->accessible($user);
        
        if($accessible['status'] != 'success')
            return response()->json(['message' => $accessible['message'], 'status' => 'error']);

        if(!Entrust::can('edit-user')&& !Entrust::can('update-shift'))
            return response()->json(['message' => trans('messages.permission_denied'), 'status' => 'error']);

        if(UserShift::whereUserId($user_id)->whereNull('to_date')->count())
            return response()->json(['message' => trans('messages.already_undefined_end_date'), 'status' => 'error']);

        //$previous_record = UserShift::whereUserId($user_id)->first();

        //if($previous_record && $request->input('from_date') <= $previous_record->from_date)
          //  return response()->json(['message' => trans('messages.back_date_entry'), 'status' => 'error']);



        if($request->has('to_date'))
            $shift = UserShift::whereUserId($user_id)
                ->where(function ($query) use($request) { $query->where(function ($query) use($request){
                    $query->where('from_date','<=',$request->input('from_date'))
                    ->where('to_date','>=',$request->input('from_date'));
                    })->orWhere(function ($query) use($request) {
                        $query->where('from_date','<=',$request->input('to_date'))
                            ->where('to_date','>=',$request->input('to_date'));
                    });})->count();
        else
            $shift = UserShift::whereUserId($user_id)->where('from_date','<=',$request->input('from_date'))->where('to_date','>=',$request->input('from_date'))->count();

        if($shift)
            return response()->json(['message' => trans('messages.entry_already_defined'), 'status' => 'error']);



        $user_shift = new UserShift;
        $data = $request->all();
        $data['to_date'] = ($request->has('to_date')) ? $request->input('to_date') : null;
        $user_shift->fill($data);

        $user_shift->shift_id = ($request->input('shift_type') == 'predefined') ? $request->input('shift_id') : null;
        $user_shift->in_time = ($request->input('shift_type') == 'custom') ? date('H:i:s',strtotime($request->input('in_time'))) : null;
        $user_shift->out_time = ($request->input('shift_type') == 'custom') ? date('H:i:s',strtotime($request->input('out_time'))) : null;
        $user_shift->overnight = ($request->has('overnight')) ? 1 : 0;

        $user_shift->save();
        $user->userShift()->save($user_shift);
        storeCustomField($this->form,$user_shift->id, $data);

        $this->logActivity(['module' => 'user','module_id' => $user_id, 'activity' => 'added','sub_module' => 'shift','sub_module_id' => $user_shift->id]);

        return response()->json(['message' => trans('messages.shift').' '.trans('messages.added'), 'status' => 'success']);
    }

    public function update(UserShiftRequest $request, UserShift $user_shift){
        $validation = validateCustomField($this->form,$request);


        
        if($validation->fails())
            return response()->json(['message' => $validation->messages()->first(), 'status' => 'error']);

        $user = $user_shift->User;

        $accessible = $this->accessible($user);
        
        if($accessible['status'] != 'success')
            return response()->json(['message' => $accessible['message'], 'status' => 'error']);

        if(!Entrust::can('edit-user')&& !Entrust::can('update-shift'))
            return response()->json(['message' => trans('messages.permission_denied'), 'status' => 'error']);



        if(UserShift::whereUserId($user_shift->user_id)->where('id','!=',$user_shift->id)->whereNull('to_date')->count())
            return response()->json(['message' => trans('messages.already_undefined_end_date'), 'status' => 'error']);

        $previous_record = UserShift::whereUserId($user_shift->user_id)->where('id','!=',$user_shift->id)->first();

        //if($previous_record && $request->input('from_date') <= $previous_record->from_date)
           // return response()->json(['message' => trans('messages.back_date_entry'), 'status' => 'error']);

        if($request->has('to_date'))
            $shift = UserShift::whereUserId($user_shift->user_id)->where('id','!=',$user_shift->id)
                ->where(function ($query) use($request) { $query->where(function ($query) use($request){
                    $query->where('from_date','<=',$request->input('from_date'))
                    ->where('to_date','>=',$request->input('from_date'));
                    })->orWhere(function ($query) use($request) {
                        $query->where('from_date','<=',$request->input('to_date'))
                            ->where('to_date','>=',$request->input('to_date'));
                    });})->count();
        else
            $shift = UserShift::whereUserId($user_shift->user_id)->where('id','!=',$user_shift->id)->where('from_date','<=',$request->input('from_date'))
                        ->where('to_date','>=',$request->input('from_date'))->count();

        if($shift)
            return response()->json(['message' => trans('messages.entry_already_defined'), 'status' => 'error']);

        $data = $request->all();
        $data['to_date'] = ($request->has('to_date')) ? $request->input('to_date') : null;
        $user_shift->fill($data);

        $user_shift->shift_id = ($request->input('shift_type') == 'predefined') ? $request->input('shift_id') : null;
        $user_shift->in_time = ($request->input('shift_type') == 'custom') ? date('H:i:s',strtotime($request->input('in_time'))) : null;
        $user_shift->out_time = ($request->input('shift_type') == 'custom') ? date('H:i:s',strtotime($request->input('out_time'))) : null;
        $user_shift->overnight = ($request->has('overnight')) ? 1 : 0;

        $user_shift->save();
        updateCustomField($this->form,$user_shift->id, $data);

        $this->logActivity(['module' => 'user','module_id' => $user->id, 'activity' => 'updated','sub_module' => 'shift','sub_module_id' => $user_shift->id]);

        return redirect('user')->with('success', trans('messages.shift').' '.trans('messages.updated'));
        //return response()->json(['message' => trans('messages.shift').' '.trans('messages.updated'), 'status' => 'success']);
    }

    public function destroy(Request $request, UserShift $user_shift){
        $user = $user_shift->User;

        $accessible = $this->accessible($user);
        
        if($accessible['status'] != 'success')
            return response()->json(['message' => $accessible['message'], 'status' => 'error']);

        if(!Entrust::can('edit-user')&& !Entrust::can('update-shift'))
            return response()->json(['message' => trans('messages.permission_denied'), 'status' => 'error']);

        deleteCustomField($this->form, $user_shift->id);

        $this->logActivity(['module' => 'user','module_id' => $user->id, 'activity' => 'deleted','sub_module' => 'shift','sub_module_id' => $user_shift->id]);

        $user_shift->delete();

        return response()->json(['message' => trans('messages.shift').' '.trans('messages.deleted'), 'status' => 'success']);
    }

    public function calendarEvents(Request $request){
        $first_day = $request->has('start') ? $request->input('start') : date('Y-m-01');
        $last_day  = $request->has('end') ? $request->input('end') : date('Y-m-t');
        $month = str_pad((date('m',strtotime($last_day)) - 1), 2, '0', STR_PAD_LEFT);

        $ushift=getDailyShift("2018-7-1", "2018-7-20",119);
        //dd($ushift);

        $birthdays = \App\Profile::whereNotNull('date_of_birth')->orderBy('date_of_birth','asc')->get();
        $anniversaries = \App\Profile::whereNotNull('date_of_anniversary')->orderBy('date_of_anniversary','asc')->get();

        $user_employment = array();
        foreach(\App\User::whereStatus('active')->get() as $active_user){
            $user_employment_detail = getEmployment(date('Y-m-d'),$active_user->id);
            if($user_employment_detail)
                $user_employment[] = $user_employment_detail->id;
        }

        $work_anniversaries=\App\UserEmployment::whereIn('id',$user_employment)->where( \DB::raw('month(date_of_joining)'), [$month])
            ->get();

        $holidays = \App\Holiday::where('date','>=',$first_day)->where('date','<=',$last_day)->get();

        $todos = \App\Todo::where('user_id','=',\Auth::user()->id)
            ->where('date','>=',$first_day)
            ->where('date','<=',$last_day)
            ->orWhere(function ($query)  {
                $query->where('user_id','!=',\Auth::user()->id)
                    ->where('visibility','=','public');
            })->get();
        $events = array();
        $events[] = array('title' => trans('messages.today'), 'start' => date('Y-m-d'), 'color' => '#380000','icon' => 'user');

        foreach($ushift as $sft){

            $start = date('Y').'-'.date('m-d',strtotime($sft['date']));
            $title = $sft['in_time'].'-'.$sft['out_time'];
            $color = '#daa520';
            $events[] = array('title' => $title, 'start' => $start, 'color' => $color,'icon' => '');
        }



        // foreach($birthdays as $birthday){
        //   $start = date('Y').'-'.date('m-d',strtotime($birthday->date_of_birth));
        //    $title = trans('messages.birthday').' : '.$birthday->User->full_name;
        //    $color = '#daa520';
        //    $events[] = array('title' => $title, 'start' => $start, 'color' => $color,'icon' => 'birthday-cake');
        // }
        foreach($anniversaries as $anniversary){
            $start = date('Y').'-'.date('m-d',strtotime($anniversary->date_of_anniversary));
            $title = trans('messages.anniversary').' : '.$anniversary->User->full_name;
            $color = '#88b04b';
            $events[] = array('title' => $title, 'start' => $start, 'color' => $color,'icon' => 'gift');
        }
        foreach($work_anniversaries as $work_anniversary){
            $start = date('Y').'-'.date('m-d',strtotime($work_anniversary->date_of_joining));
            $title = ((date('Y',strtotime($work_anniversary->date_of_joining) != date('Y')) ) ? (trans('messages.work').' '.trans('messages.anniversary')) : (trans('messages.new').' '.trans('messages.joining')) ).' : '.$work_anniversary->User->full_name;
            $color = '#6dc066';
            $events[] = array('title' => $title, 'start' => $start, 'color' => $color,'icon' => 'briefcase');
        }
        foreach($todos as $todo){
            $start = $todo->date;
            $title = trans('messages.to_do').' : '.$todo->title.' '.$todo->description;
            $color = '#ff0000';
            $url = '/todo/'.$todo->id.'/edit';
            $events[] = array('title' => $title, 'start' => $start, 'color' => $color, 'url' => $url,'icon' => 'list-ul');
        }
        foreach($holidays as $holiday){
            $start = $holiday->date;
            $title = trans('messages.holiday').' : '.$holiday->description;
            $color = '#133edb';
            $events[] = array('title' => $title, 'start' => $start, 'color' => $color,'icon' => 'fighter-jet');
        }

        $tasks = \App\Task::whereHas('user',function($query){
            $query->where('user_id',\Auth::user()->id);
        })->orWhere('user_id',\Auth::user()->id)->get();

        foreach($tasks as $task){
            $events[] = array(
                'title' => trans('messages.task').' '.trans('messages.start').' '.trans('messages.date').' : '.$task->title,
                'start' => $task->start_date,
                'color' => '#50f442',
                'url' => '/task/'.$task->id,
                'icon' => 'tasks');

            $events[] = array(
                'title' => trans('messages.task').' '.trans('messages.due').' '.trans('messages.date').' : '.$task->title,
                'start' => $task->due_date,
                'color' => '#f44242',
                'url' => '/task/'.$task->id,
                'icon' => 'tasks');
        }

        return $events;
    }

}