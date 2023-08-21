@props([
    'type'=> "text",
    'name'=>$name,
    'label'=>$label,
    'value'=>old($name)
    ])

<div class="relative z-0 w-full mb-6 group">
    <label class="block mb-2 text-sm font-medium text-gray-900" for="{{$name}}">{{$label}}</label>
    <input type="file" name="{{$name}}" id="{{$name}}"  value="{{$value}}"
           class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
           multiple accept="image/*">
    @error($name)
    <div class="mt-2 text-sm text-red-600">
        {{$message}}
    </div>
    @enderror
</div>
