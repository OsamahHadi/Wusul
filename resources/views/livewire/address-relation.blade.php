<div class='row'>
    <div class="mb-3 col-md-6">
        <label for="timeZones" class="form-label">المحافظة</label>

        <select id="Basic" wire:model='state' name='state' class="form-select  w-100" data-style="btn-default">
            <option value="0">اختر</option>
            @forelse($states as $state)

            <option value="{{$state->id}}">{{$state->name}}</option>
            @empty

            @endforelse

        </select>
    </div>

    <div class="mb-3 col-md-6">
        <label for="timeZones" class="form-label">المدينة</label>
        <select id="selectpickerBasic" wire:model='city' class="form-select  w-100" data-style="btn-default" name='city'>
            <option value="0">اختر</option>
            @foreach($states as $state)
            @forelse($state->cities as $city)
            <option value="{{$city->id}}">{{$city->name}}</option>
            @empty

            @endforelse

            @endforeach
        </select>
    </div>
</div>
