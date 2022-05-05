<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('img/logo_1.png') }}" class="logo" alt="One Oasis Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
