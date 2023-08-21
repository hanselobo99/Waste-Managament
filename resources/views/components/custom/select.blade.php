@props([
    'type'=> "text",
    'name'=>$name,
    'label'=>$label,
    'value'=>old($name),
    'options'=>$options
    ])

<div class="relative z-0 w-full mb-6 group">
    <label for="{{$name}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{$label}}</label>
    <select name="{{$name}}" id="{{$name}}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @foreach ($options as $key => $option)
            <option value="{{ $key }}"
                    @if (old($name) === $key)
                        selected="selected"
                @endif
            >{{ $option }}</option>
        @endforeach
    </select>
    @error($name)
    <div class="mt-2 text-sm text-red-600">
        {{$message}}
    </div>
    @enderror
</div>



