@props(['helpers', 'student'])
@php
  if ($helpers->count() > 1) {
    $selected = $helpers->where('id', '!=', $student->helper)->where('id', '!=', $student->id)->random()->id;
  }
    
@endphp
<select name="helper" id="">
  @if ($helpers->count() > 1)
    @foreach ($helpers as $helper )
      <option value="{{ $helper->id }}" {{ $helper->id === $selected ? "selected" : "" }}>{{ $helper->name }}</option>
    @endforeach
  @endif
 
</select>