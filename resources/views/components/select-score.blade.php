@php
    $color = [
        'AD' => 'background-color: rgba(40, 167, 69, .4)',
        'A' => 'background-color: rgba(0, 123, 255, .4)',
        'B' => 'background-color: rgba(255, 193, 7, .4)',
        'C' => 'background-color: rgba(220, 53, 69, .4)',
        '' => '',
    ]
@endphp
<select class="custom-select custom-select-sm" name="{{ $name }}[]" id="" {{ $disabled }} {{-- style="{{ $color[$score[$name]] }}" --}}>
    <option value="" {{ $score[$name] == '' ? 'selected' : ''}}>---</option>
    <option value="AD" {{ $score[$name] == 'AD' ? 'selected' : ''}}>AD</option>
    <option value="A" {{ $score[$name] == 'A' ? 'selected' : ''}}>A</option>
    <option value="B" {{ $score[$name] == 'B' ? 'selected' : ''}}>B</option>
    <option value="C" {{ $score[$name] == 'C' ? 'selected' : ''}}>C</option>
</select>