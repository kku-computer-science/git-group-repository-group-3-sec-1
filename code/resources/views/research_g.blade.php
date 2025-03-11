@extends('layouts.layout')
@section('content')
<div class="container card-3 ">
    <p>{{ trans('message.ResearchGroup') }}</p>
    @foreach ($resg as $rg)
    <div class="card mb-4">
        <div class="row g-0">
            <div class="col-md-4">
                <div class="card-body">
                    <img src="{{asset('img/'.$rg->group_image)}}" alt="...">
                    <h2 class="card-text-1">{{ trans('message.laboratorysupervisor') }}</h2>
                    
                    @if(app()->getLocale() == 'cn')
                    <h2 class="card-text-2">
                        @foreach ($rg->user as $r)
                        @if($r->hasRole('teacher'))
                        @if(app()->getLocale() == 'cn' and $r->academic_ranks_en == 'Lecturer' and $r->doctoral_degree == 'Ph.D.')
                             {{ $r->{'fname_'.app()->getLocale()} ?? $r->fname_en ?? $r->fname_th}} 
                             {{ $r->{'lname_'.app()->getLocale()} ?? $r->lname_en ?? $r->lname_th}}
                             
                             @if(app()->getLocale() == 'th')
                             @else
                             {{ trans('message.,Ph.d') }}
                             @endif
                            <br>
                            @elseif(app()->getLocale() == 'cn' and $r->academic_ranks_en == 'Lecturer')
                            {{ $r->{'fname_'.app()->getLocale()} ?? $r->fname_en ?? $r->fname_th}} 
                            {{ $r->{'lname_'.app()->getLocale()} ?? $r->lname_en ?? $r->lname_th}}
                            <br>
                            @elseif(app()->getLocale() == 'cn' and $r->doctoral_degree == 'Ph.D.')
                            {{ str_replace('Dr.', ' ', $r->{'position_'.app()->getLocale()}) ?? $r->position_en ?? $r->position_th}} 
                            {{ $r->{'fname_'.app()->getLocale()} ?? $r->fname_en ?? $r->fname_th}} 
                            {{ $r->{'lname_'.app()->getLocale()} ?? $r->lname_en ?? $r->lname_th}}
                            @if(app()->getLocale() == 'th')
                             @else
                             {{ trans('message.,Ph.d') }}
                             @endif
                            <br>
                            @else                            
                            {{ $r->{'position_'.app()->getLocale()} ?? $r->position_en ?? $r->position_th}} 
                            {{ $r->{'fname_'.app()->getLocale()} ?? $r->fname_en ?? $r->fname_th}} 
                            {{ $r->{'lname_'.app()->getLocale()} ?? $r->lname_en ?? $r->lname_th}}
                            <br>
                            @endif
                        @endif
                        
                        @endforeach
                    </h2>
                    @else
                    <h2 class="card-text-2">
                        @foreach ($rg->user as $r)
                        @if($r->hasRole('teacher'))
                        @if(app()->getLocale() == 'en' and $r->academic_ranks_en == 'Lecturer' and $r->doctoral_degree == 'Ph.D.')
                             {{ $r->{'fname_'.app()->getLocale()} ?? $r->fname_th ?? $r->fname_cn}} 
                             {{ $r->{'lname_'.app()->getLocale()} ?? $r->lname_th ?? $r->lname_cn}}, Ph.D.
                            <br>
                            @elseif(app()->getLocale() == 'en' and $r->academic_ranks_en == 'Lecturer')
                            {{ $r->{'fname_'.app()->getLocale()} ?? $r->fname_th ?? $r->fname_cn}} 
                            {{ $r->{'lname_'.app()->getLocale()} ?? $r->lname_th ?? $r->lname_cn}}
                            <br>
                            @elseif(app()->getLocale() == 'en' and $r->doctoral_degree == 'Ph.D.')
                            {{ str_replace('Dr.', ' ', $r->{'position_'.app()->getLocale()}) ?? $r->position_th ?? $r->position_cn}} 
                            {{ $r->{'fname_'.app()->getLocale()} ?? $r->fname_th ?? $r->fname_cn}} 
                            {{ $r->{'lname_'.app()->getLocale()} ?? $r->lname_th ?? $r->lname_cn}}, Ph.D.
                            <br>
                            @else                            
                            {{ $r->{'position_'.app()->getLocale()} ?? $r->position_th ?? $r->position_cn}} 
                            {{ $r->{'fname_'.app()->getLocale()} ?? $r->fname_th ?? $r->fname_cn}} 
                            {{ $r->{'lname_'.app()->getLocale()} ?? $r->lname_th ?? $r->lname_cn}}
                            <br>
                            @endif
                        @endif
                        
                        @endforeach
                    </h2>
                    @endif
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"> {{ $rg->{'group_name_'.app()->getLocale()} ?? $rg->group_name_en ?? $rg->group_name_th ?? $rg->group_name_cn}}</>
                    </h5>
                    <h3 class="card-text">{{ Str::limit($rg->{'group_desc_'.app()->getLocale()}, 350) 
                        ?? Str::limit($rg->group_desc_en, 350)
                        ?? Str::limit($rg->group_desc_th, 350)
                        ?? Str::limit($rg->group_desc_cn, 350)
                    }}
                    </h3>
                </div>
                <div>
                    <a href="{{ route('researchgroupdetail',['id'=>$rg->id])}}"
                        class="btn btn-outline-info">{{ trans('message.details') }}</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@stop