<select class="custom-select custom-select-sm" name="{{ $name }}[]" id="" {{ $disabled }}>
    <option value="" {{ $score[$name] == '' ? 'selected' : ''}}>---</option>
    <option value="AD" {{ $score[$name] == 'AD' ? 'selected' : ''}}>AD</option>
    <option value="A" {{ $score[$name] == 'A' ? 'selected' : ''}}>A</option>
    <option value="B" {{ $score[$name] == 'B' ? 'selected' : ''}}>B</option>
    <option value="C" {{ $score[$name] == 'C' ? 'selected' : ''}}>C</option>
</select>