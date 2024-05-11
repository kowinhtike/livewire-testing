<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <h1>This is Time Filter</h1>
    
    <div>
        <select wire:model="time">
            <option value=""> All Notes </option>
            <option value="day">Day</option>
            <option value="month">Month</option>
            <option value="year">Year</option>
            <option value="range">Range</option>
        </select>
    </div>
    {{-- @if ($time)
    <h3>You selected : {{$time}} </h3>
    @endif --}}
    @if ($time == "range")
    <div>
        <input type="date" wire:model="start_date">
        <input type="date" wire:model="end_date">
        {{-- {{$start_date." and ".$end_date}} --}}
    </div>
    @else
    <div>
        <input type="date" wire:model="date">
    </div>
    {{-- {{$date}} --}}
    @endif
    
    <table>
        <tr>
            <th>id</th>
            <th>about</th>
            <th>amount</th>
            <th>created_at</th>
        </tr>
        @foreach ($notes as $note)
            <tr>
                <td> {{$note->id}} </td>
                <td> {{$note->about}} </td>
                <td> {{$note->amount}} </td>
                <td> {{$note->created_at}} </td>
            </tr>
        @endforeach
    </table>
    
</div>
