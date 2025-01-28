@props(['disabled' => false, 'value' => '', 'options' => [], 'placeholder' => 'Selectionnez une option'])

<select @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}>

</select>
