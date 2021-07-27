@foreach ($controls as $control)
    <div class="card-text mb-3">
        <label class="form-label">{{ $control['title'] }}</label>

        @if ($control['type'] == 'text' or $control['type'] == 'date')
            <input 
                class="form-control" 
                type="{{ $control['type'] }}"
                value="{{ old($control['name'], $item->{$control['name']} ?? '') }}" 
                name="{{ $control['name'] }}" 
                id="{{ $control['name'] }}" 
                placeholder="{{ $control['placeholder'] }}" 
                required>
        @endif

        @if ($control['type'] == 'textarea')
            <textarea 
                class="form-control" 
                name="{{ $control['name'] }}" 
                id="{{ $control['name'] }}" 
                rows="3" 
                placeholder="{{ $control['placeholder'] }}" 
                required>{{ old($control['name'], $item->{$control['name']} ?? '') }}</textarea>
        @endif

        @if ($control['type'] == 'select')
            <select 
                class="form-select form-control" 
                name="{{ $control['name'] . '_id' }}" 
                id="{{ $control['name'] }}" 
                required>
                <option disabled selected hidden>{{ $control['placeholder'] }}</option>
                @foreach ($control['list_items'] as $list_item)
                    <option value="{{ $list_item->id }}"
                        @if (old($control['name'] . '_id', $control['select_item_id'] ?? '') == $list_item->id)
                            selected
                        @endif>
                        {{ $list_item->title }}
                    </option>
                @endforeach
            </select>
        @endif

        @if ($control['type'] == 'image')
            @isset ($item)
                <div class="d inline">
                    <img 
                        class="d-inline-block" 
                        src="{{ asset('/storage/' . $item->image) }}" 
                        height="150" 
                        width="150" 
                        alt="изображение {{ $item->image }} отсутствует на сервере">
                </div>
             @endisset
            <input 
                type="file" 
                class="form-control-file" 
                name="{{ $control['name'] }}" 
                id="{{ $control['name'] }}"
                accept=".jpg, .png, .gif, .bmp">
        @endif
    </div>
@endforeach  