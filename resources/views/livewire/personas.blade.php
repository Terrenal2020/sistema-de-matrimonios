<div>
    <div wire:ignore>
        <select class="form-control" id="select2-dropdown">
            <option value="">Select Option</option>
            @foreach($personas as $personass)
            
            <option value="{{ $item }}">{{ $personass }}</option>
            @endforeach
        </select>
    </div>
</div>
@push('scripts')

@endpush