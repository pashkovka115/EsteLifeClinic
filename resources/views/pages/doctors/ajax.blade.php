@foreach($doctors as $doctor)
    <div class="doc-card">
        @if($doctor->img)
            <div class="image"><img src="/storage/{{ $doctor->img }}" alt=""></div>
        @endif
        <div class="desc">
            <div class="title">{{ $doctor->name }}</div>
            @foreach($doctor->professions as $profession)
                <div class="pos">{{ $profession->name }}</div>
            @endforeach
            @if($doctor->jobs->count() > 2)
                <?php
                $jobs = $doctor->jobs->toArray();

                $start = \Carbon\Carbon::create($jobs[0]['start']);
                $end = \Carbon\Carbon::create(array_pop($jobs)['end']);
                $diff = $start->diffInYears($end);
                ?>
                <div class="stage"><b>{{ $diff }} {{ Lang::choice('год|года|лет', $diff) }}</b> Стаж работы
                </div>
            @endif
        </div>
            <a href="{{ route('front.doctors.show', ['slug' => $doctor->slug]) }}" class="overlay"></a>
    </div>
@endforeach
