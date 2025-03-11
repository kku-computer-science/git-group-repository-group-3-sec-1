@extends('layouts.layout')
@section('content')
<div class="container card-2">
    <p class="title">{{ trans('message.Researchers') }}</p>
    @foreach($request as $res)
    <span>
        @php
            $locale = app()->getLocale();
            $programName = $locale == 'en' ? $res->program_name_en 
                        : ($locale == 'th' ? $res->program_name_th 
                        : $res->program_name_cn);
        @endphp

        <ion-icon name="caret-forward-outline" size="small"></ion-icon> {{ $programName }}
    </span>
    <div class="d-flex">
        <div class="ml-auto">
            <form class="row row-cols-lg-auto g-3" method="GET" action="{{ route('searchresearchers',['id'=>$res->id])}}">
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control" name="textsearch" placeholder="{{ trans('message.researchinterest') }}">
                    </div>
                </div>
                <!-- <div class="col-12">
                        <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                        <select class="form-select" id="inlineFormSelectPref">
                            <option selected> Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div> -->
                <div class="col-md-4">
                    <button type="submit" class="btn btn-outline-primary">{{ trans('message.search') }}</button>
                </div>
            </form>
        </div>
    </div>


    <div class="row row-cols-1 row-cols-md-2 g-0">
        @foreach($users as $r)
        <a href="{{ route('detail',Crypt::encrypt($r->id))}}">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-sm-4">
                        <img class="card-image" src="{{ $r->picture}}" alt="">
                    </div>
                    <div class="col-sm-8 overflow-hidden" style="text-overflow: clip; @if(app()->getLocale() == 'en') max-height: 220px; @else max-height: 210px;@endif">
                        <div class="card-body">
                            @php
                                $locale = app()->getLocale();
                                $firstName = $r->{'fname_'.$locale} ?? $r->fname_en ?? $r->fname_th ?? $r->fname_cn;
                                $lastName = $r->{'lname_'.$locale} ?? $r->lname_en ?? $r->lname_th ?? $r->lname_cn;
                                $position = $r->{'position_'.$locale} ?? $r->position_en ?? $r->position_th ?? $r->position_cn;
                                $academicRank = $r->{'academic_ranks_'.$locale} ?? $r->academic_ranks_en ?? $r->academic_ranks_th ?? $r->academic_ranks_cn;
                                $doctoralDegree = $r->doctoral_degree == 'Ph.D.' ? ', ' . $r->doctoral_degree : '';
                                $expertiseField = 'expert_name' . ($locale == 'th' ? '_th' : ($locale == 'cn' ? '_cn' : '') );
                            @endphp

                            @if($locale == 'en')
                                <h5 class="card-title">{{ $firstName }} {{ $lastName }}{{ $doctoralDegree }}</h5>
                                <h5 class="card-title-2">{{ $academicRank }}</h5>
                            @else
                                <h5 class="card-title">{{ $position }} {{ $firstName }} {{ $lastName }}</h5>
                            @endif

                            <p class="card-text-1">{{ trans('message.expertise') }}</p>
                            <div class="card-expertise">
                                @php
                                    $expertiseCount = $r->expertise->count();
                                @endphp

                                @if($expertiseCount > 0)
                                    @foreach($r->expertise->sortBy('expert_name') as $exper)
                                        @php
                                            // Define the language field names based on the locale
                                            $localeField = 'expert_name_' . $locale;
                                            $expertise = $exper->$localeField 
                                                ?? $exper->expert_name 
                                                ?? $exper->expert_name_th 
                                                ?? $exper->expert_name_cn;
                                        @endphp

                                        @if($expertise)
                                            <p class="card-text"> {{ $expertise }}</p>
                                        @endif
                                    @endforeach
                                @else
                                    <p class="card-text">{{ trans('message.noexpertise') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
        @endforeach
    </div>
</div>

@stop