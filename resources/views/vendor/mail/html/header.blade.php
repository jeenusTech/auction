<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{asset('/frontend/logo/logo_small.png')}}" class="logo" alt="{{config('app.name')}} Logo">
@else
<img src="{{asset('/frontend/logo/logo_small.png')}}" class="logo" alt="{{config('app.name')}} Logo">
@endif
</a>
</td>
</tr>
