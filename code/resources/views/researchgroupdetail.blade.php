@extends('layouts.layout')
<style>
    .name {

        font-size: 20px;

    }
</style>
@section('content')
<div class="container card-4 mt-5">
    <div class="card">
        @foreach ($resgd as $rg)
        <div class="row g-0">
            <div class="col-md-4">
                <div class="card-body">
                    <img src="{{asset('img/'.$rg->group_image)}}" alt="...">
                    <h1 class="card-text-1">{{ trans('message.laboratorysupervisor') }}</h1>
                    <h2 class="card-text-2">
                        @foreach ($rg->user as $r)
                        @if($r->hasRole('teacher'))
                        @if( $r->academic_ranks_en == 'Lecturer' and $r->doctoral_degree == 'Ph.D.')
                             {{ $r->{'fname_'.app()->getLocale()} ?? $r->fname_en ?? $r->fname_th ?? $r->fname_cn}} 
                             {{ $r->{'lname_'.app()->getLocale()} ?? $r->lname_en ?? $r->lname_th ?? $r->lname_cn}}
                             @if(app()->getLocale() == 'th')
                             @else
                             {{ trans('message.,Ph.d') }}
                             @endif
                            <br>
                            @elseif( $r->academic_ranks_en == 'Lecturer')
                            {{ $r->{'fname_'.app()->getLocale()} ?? $r->fname_en ?? $r->fname_th ?? $r->fname_cn}} 
                            {{ $r->{'lname_'.app()->getLocale()} ?? $r->fname_en ?? $r->fname_th ?? $r->fname_cn}}
                            <br>
                            @elseif( $r->doctoral_degree == 'Ph.D.')
                            {{ str_replace('Dr.', ' ', $r->{'position_'.app()->getLocale()}) ?? $r->position_en ?? $r->position_th ?? $r->position_cn}} 
                            {{ $r->{'fname_'.app()->getLocale()} ?? $r->fname_en ?? $r->fname_th ?? $r->fname_cn}} 
                            {{ $r->{'lname_'.app()->getLocale()} ?? $r->fname_en ?? $r->fname_th ?? $r->fname_cn}}
                            @if(app()->getLocale() == 'th')
                             @else
                             {{ trans('message.,Ph.d') }}
                             @endif
                            <br>
                            @else                            
                            {{ $r->{'position_'.app()->getLocale()} ?? $r->position_en ?? $r->position_th ?? $r->position_cn}}
                            {{ $r->{'fname_'.app()->getLocale()} ?? $r->fname_en ?? $r->position_th ?? $r->position_cn}} 
                            {{ $r->{'lname_'.app()->getLocale()} ?? $r->lname_en ?? $r->position_th ?? $r->position_cn}}
                            <br> 
                            @endif
                        
                        @endif
                        @endforeach
                    </h2>
                    <h1 class="card-text-1"> {{ trans('message.Student') }} </h1>
                    @php
                        $studentCount = $rg->user->filter(fn($user) => $user->hasRole('student'))->count();
                    @endphp

                    <h2 class="card-text-2">
                        @if($studentCount > 0)
                            @foreach ($rg->user as $user)
                                @if($user->hasRole('student'))
                                    {{ $user->{'position_'.app()->getLocale()} ?? $user->position_en ?? $user->position_th ?? $user->position_cn }} 
                                    {{ $user->{'fname_'.app()->getLocale()} ?? $user->fname_en ?? $user->fname_th ?? $user->fname_cn}} 
                                    {{ $user->{'lname_'.app()->getLocale()} ?? $user->lname_en ?? $user->lname_th ?? $user->lname_cn}} 
                                    <br>
                                @endif
                            @endforeach
                        @else
                            {{ trans('message.nostudentwithinRG') }}
                        @endif
                    </h2>
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
                
            </div>
            @endforeach
            <!-- <div id="loadMore">
                <a href="#"> Load More </a>
            </div> -->
        </div>

    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    $(document).ready(function() {
        $(".moreBox").slice(0, 1).show();
        if ($(".blogBox:hidden").length != 0) {
            $("#loadMore").show();
        }
        $("#loadMore").on('click', function(e) {
            e.preventDefault();
            $(".moreBox:hidden").slice(0, 1).slideDown();
            if ($(".moreBox:hidden").length == 0) {
                $("#loadMore").fadeOut('slow');
            }
        });
    });
</script>

@stop
<!-- <div class="card-body-research">
                    <p>Research</p>
                    <table class="table">
                        @foreach($rg->user as $user)
                        
                        <thead>
                            <tr>
                                <th><b class="name">{{$user->{'position_'.app()->getLocale()} }} {{$user->{'fname_'.app()->getLocale()} }} {{$user->{'lname_'.app()->getLocale()} }}</b></th>
                            </tr>
                            @foreach($user->paper->sortByDesc('paper_yearpub') as $p)
                            <tr class="hidden">
                                <th>
                                    <b><math>{!! html_entity_decode(preg_replace('<inf>', 'sub', $p->paper_name)) !!}</math></b> (
                                    <link>@foreach($p->teacher as $teacher){{$teacher->fname_en}} {{$teacher->lname_en}},
                                    @endforeach
                                    @foreach($p->author as $author){{$author->author_fname}} {{$author->author_lname}}@if (!$loop->last),@endif
                                    @endforeach</link>), {{$p->paper_sourcetitle}}, {{$p->paper_volume}},
                                    {{ $p->paper_yearpub }}.
                                    <a href="{{$p->paper_url}} " target="_blank">[url]</a> <a href="https://doi.org/{{$p->paper_doi}}" target="_blank">[doi]</a>
                                </th>
                            </tr>
                            @endforeach
                        </thead>
                        @endforeach
                    </table>
                </div> -->