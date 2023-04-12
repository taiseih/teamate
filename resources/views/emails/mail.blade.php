名前：{{ $name }}<br>
@if (is_string($attendance))
    出勤時刻：{{ $attendance }}<br>
    @if ($information)
        欠勤理由：{{ $information }}<br>
    @endif
@else
    退勤時刻：{{ $attendance->format('m月d日 H時i分s秒') }}<br>
    業務報告：{{ $information }}<br>
@endif
@if ($jobType !== null)
    業務形態：{{ $jobType }}<br>
    体調：{{ $status }}<br>
@endif
