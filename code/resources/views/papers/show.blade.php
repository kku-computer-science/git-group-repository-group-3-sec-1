@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
    <div class="container">
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title">{{ trans('message.Published_research_detail') }}</h4>
                <p class="card-description">{{ trans('message.Published_research_description') }}</p>
                <div class="row mt-3">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Published_research_title') }}</b></p>
                    <p class="card-text col-sm-9">
                    @php
                                            $locale = app()->getLocale();
                                            $papername = $locale == 'en' ? ($paper->paper_name ?? $paper->paper_name_th ?? $paper->paper_name_cn)
                                                    : ($locale == 'th' ? ($paper->paper_name_th ?? $paper->paper_name ?? $paper->paper_name_cn)
                                                    : ($paper->paper_name_cn ?? $paper->paper_name ?? $paper->paper_name_th));
                                        @endphp
                                        {{ $papername }}
                    </p>
                </div>
                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Published_research_abstract') }}</b></p>
                    <p class="card-text col-sm-9">
                    @php
                                            $locale = app()->getLocale();
                                            $abstract = $locale == 'en' ? ($paper->abstract ?? $paper->abstract_th ?? $paper->abstract_cn)
                                                    : ($locale == 'th' ? ($paper->abstract_th ?? $paper->abstract ?? $paper->abstract_cn)
                                                    : ($paper->abstract_cn ?? $paper->abstract ?? $paper->abstract_th));
                                        @endphp
                                        {{ $abstract }}

                    </p>
                </div>
                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Published_research_keyword') }}</b></p>
                    <p class="card-text col-sm-9">
                        {{ $paper->keyword }}
                    </p>


                    <!-- <p class="card-text col-sm-9">{{ $paper->keyword }}</p> -->
                </div>
                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Published_research_journalType') }}</b></p>
                    <p class="card-text col-sm-9">
                        @if (App::getLocale() == 'th')
                            @if ($paper->paper_type == 'Journal')
                                {{ trans('message.Published_research_journal') }}
                            @elseif($paper->paper_type == 'Conference Proceeding')
                                {{ trans('message.Published_research_conference') }}
                            @elseif($paper->paper_type == 'Book Series')
                                {{ trans('message.Published_research_book_series') }}
                            @elseif($paper->paper_type == 'Book')
                                {{ trans('message.Published_research_book') }}
                            @endif
                        @elseif(App::getLocale() == 'en')
                            @if ($paper->paper_type == 'Journal')
                                {{ trans('message.Published_research_journal') }}
                            @elseif($paper->paper_type == 'Conference Proceeding')
                                {{ trans('message.Published_research_conference') }}
                            @elseif($paper->paper_type == 'Book Series')
                                {{ trans('message.Published_research_book_series') }}
                            @elseif($paper->paper_type == 'Book')
                                {{ trans('message.Published_research_book') }}
                            @endif
                        @elseif(App::getLocale() == 'cn')
                            @if ($paper->paper_type == 'Journal')
                                {{ trans('message.Published_research_journal') }}
                            @elseif($paper->paper_type == 'Conference Proceeding')
                                {{ trans('message.Published_research_conference') }}
                            @elseif($paper->paper_type == 'Book Series')
                                {{ trans('message.Published_research_book_series') }}
                            @elseif($paper->paper_type == 'Book')
                                {{ trans('message.Published_research_book') }}
                            @endif
                        @endif
                    </p>
                </div>

                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Published_research_documentType') }}</b></p>
                    <p class="card-text col-sm-9">
                        @if (App::getLocale() == 'th')
                            @if ($paper->paper_subtype == 'Article')
                                {{ trans('message.Published_research_document_type_article') }}
                            @elseif($paper->paper_subtype == 'Conference Paper')
                                {{ trans('message.Published_research_document_type_conference') }}
                            @elseif($paper->paper_subtype == 'Editorial')
                                {{ trans('message.Published_research_document_type_editorial') }}
                            @elseif($paper->paper_subtype == 'Book Chapter')
                                {{ trans('message.Published_research_document_type_bookchapter') }}
                            @elseif($paper->paper_subtype == 'Erratum')
                                {{ trans('message.Published_research_document_type_erratum') }}
                            @elseif($paper->paper_subtype == 'Review')
                                {{ trans('message.Published_research_document_type_review') }}
                            @endif
                        @elseif(App::getLocale() == 'en')
                            @if ($paper->paper_subtype == 'Article')
                                {{ trans('message.Published_research_document_type_article') }}
                            @elseif($paper->paper_subtype == 'Conference Paper')
                                {{ trans('message.Published_research_document_type_conference') }}
                            @elseif($paper->paper_subtype == 'Editorial')
                                {{ trans('message.Published_research_document_type_editorial') }}
                            @elseif($paper->paper_subtype == 'Book Chapter')
                                {{ trans('message.Published_research_document_type_bookchapter') }}
                            @elseif($paper->paper_subtype == 'Erratum')
                                {{ trans('message.Published_research_document_type_erratum') }}
                            @elseif($paper->paper_subtype == 'Review')
                                {{ trans('message.Published_research_document_type_review') }}
                            @endif
                        @elseif(App::getLocale() == 'cn')
                            @if ($paper->paper_subtype == 'Article')
                                {{ trans('message.Published_research_document_type_article') }}
                            @elseif($paper->paper_subtype == 'Conference Paper')
                                {{ trans('message.Published_research_document_type_conference') }}
                            @elseif($paper->paper_subtype == 'Editorial')
                                {{ trans('message.Published_research_document_type_editorial') }}
                            @elseif($paper->paper_subtype == 'Book Chapter')
                                {{ trans('message.Published_research_document_type_bookchapter') }}
                            @elseif($paper->paper_subtype == 'Erratum')
                                {{ trans('message.Published_research_document_type_erratum') }}
                            @elseif($paper->paper_subtype == 'Review')
                                {{ trans('message.Published_research_document_type_review') }}
                            @endif
                        @endif
                    </p>
                </div>
                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Published_research_publication') }}</b></p>
                    <p class="card-text col-sm-9">
                        @if (App::getLocale() == 'th')
                            @if ($paper->publication == 'International Journal')
                                {{ trans('message.Published_research_publication_international_journal') }}
                            @elseif($paper->publication == 'International Book')
                                {{ trans('message.Published_research_publication_international_book') }}
                            @elseif($paper->publication == 'International Conference')
                                {{ trans('message.Published_research_publication_international_conference') }}
                            @elseif($paper->publication == 'National Conference')
                                {{ trans('message.Published_research_publication_national_conference') }}
                            @elseif($paper->publication == 'National Journal')
                                {{ trans('message.Published_research_publication_national_journal') }}
                            @elseif($paper->publication == 'National Book')
                                {{ trans('message.Published_research_publication_national_book') }}
                            @elseif($paper->publication == 'National Magazine')
                                {{ trans('message.Published_research_publication_national_magazine') }}
                            @elseif($paper->publication == 'Book Chapter')
                                {{ trans('message.Published_research_publication_book_chapter') }}
                            @endif
                        @elseif(App::getLocale() == 'en')
                            @if ($paper->publication == 'International Journal')
                                {{ trans('message.Published_research_publication_international_journal') }}
                            @elseif($paper->publication == 'International Book')
                                {{ trans('message.Published_research_publication_international_book') }}
                            @elseif($paper->publication == 'International Conference')
                                {{ trans('message.Published_research_publication_international_conference') }}
                            @elseif($paper->publication == 'National Conference')
                                {{ trans('message.Published_research_publication_national_conference') }}
                            @elseif($paper->publication == 'National Journal')
                                {{ trans('message.Published_research_publication_national_journal') }}
                            @elseif($paper->publication == 'National Book')
                                {{ trans('message.Published_research_publication_national_book') }}
                            @elseif($paper->publication == 'National Magazine')
                                {{ trans('message.Published_research_publication_national_magazine') }}
                            @elseif($paper->publication == 'Book Chapter')
                                {{ trans('message.Published_research_publication_book_chapter') }}
                            @endif
                        @elseif(App::getLocale() == 'cn')
                            @if ($paper->publication == 'International Journal')
                                {{ trans('message.Published_research_publication_international_journal') }}
                            @elseif($paper->publication == 'International Book')
                                {{ trans('message.Published_research_publication_international_book') }}
                            @elseif($paper->publication == 'International Conference')
                                {{ trans('message.Published_research_publication_international_conference') }}
                            @elseif($paper->publication == 'National Conference')
                                {{ trans('message.Published_research_publication_national_conference') }}
                            @elseif($paper->publication == 'National Journal')
                                {{ trans('message.Published_research_publication_national_journal') }}
                            @elseif($paper->publication == 'National Book')
                                {{ trans('message.Published_research_publication_national_book') }}
                            @elseif($paper->publication == 'National Magazine')
                                {{ trans('message.Published_research_publication_national_magazine') }}
                            @elseif($paper->publication == 'Book Chapter')
                                {{ trans('message.Published_research_publication_book_chapter') }}
                            @endif
                        @endif
                    </p>

                </div>
                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Published_research_author') }}</b></p>
                    <p class="card-text col-sm-9">

                        @foreach ($paper->author as $teacher)
                            @if ($teacher->pivot->author_type == 1)
                                <b>{{ trans('message.Published_research_first_author') }}:</b>
                                @php
                                            $locale = app()->getLocale();
                                            $fname = $locale == 'en' ? ($teacher->author_fname ?? $teacher->author_fname_th ?? $teacher->author_fname_cn)
                                                    : ($locale == 'th' ? ($teacher->author_fname_th ?? $teacher->author_fname ?? $teacher->author_fname_cn)
                                                    : ($teacher->author_fname_cn ?? $teacher->author_fname ?? $teacher->author_fname_th));

                                            $lname = $locale == 'en' ? ($teacher->author_lname ?? $teacher->author_lname_th ?? $teacher->author_lname_cn)
                                                    : ($locale == 'th' ? ($teacher->author_lname_th ?? $teacher->author_lname ?? $teacher->author_lname_cn)
                                                    : ($teacher->author_lname_cn ?? $teacher->author_lname ?? $teacher->author_lname_th));
                                        @endphp
                                        {{ $fname }} {{ $lname }} <br>
                            @endif
                        @endforeach
                        @foreach ($paper->teacher as $teacher)
                            @if ($teacher->pivot->author_type == 1)
                                <b>{{ trans('message.Published_research_first_author') }}:</b> 
                                            @php
                                                $fname = $locale == 'en' ? ($teacher->fname_en ?? $teacher->fname_th ?? $teacher->fname_cn)
                                                        : ($locale == 'th' ? ($teacher->fname_th ?? $teacher->fname_en ?? $teacher->fname_cn)
                                                        : ($teacher->fname_cn ?? $teacher->fname_en ?? $teacher->fname_th));

                                                $lname = $locale == 'en' ? ($teacher->lname_en ?? $teacher->lname_th ?? $teacher->lname_cn)
                                                        : ($locale == 'th' ? ($teacher->lname_th ?? $teacher->lname_en ?? $teacher->lname_cn)
                                                        : ($teacher->lname_cn ?? $teacher->lname_en ?? $teacher->lname_th));
                                            @endphp
                                            {{ $fname }} {{ $lname }}
                                <br>
                            @endif
                        @endforeach

                        @foreach ($paper->author as $teacher)
                            @if ($teacher->pivot->author_type == 2)
                                <b>{{ trans('message.Published_research_co_author') }}:</b> @php
                                            $locale = app()->getLocale();
                                            $fname = $locale == 'en' ? ($teacher->author_fname ?? $teacher->author_fname_th ?? $teacher->author_fname_cn)
                                                    : ($locale == 'th' ? ($teacher->author_fname_th ?? $teacher->author_fname ?? $teacher->author_fname_cn)
                                                    : ($teacher->author_fname_cn ?? $teacher->author_fname ?? $teacher->author_fname_th));

                                            $lname = $locale == 'en' ? ($teacher->author_lname ?? $teacher->author_lname_th ?? $teacher->author_lname_cn)
                                                    : ($locale == 'th' ? ($teacher->author_lname_th ?? $teacher->author_lname ?? $teacher->author_lname_cn)
                                                    : ($teacher->author_lname_cn ?? $teacher->author_lname ?? $teacher->author_lname_th));
                                        @endphp
                                        {{ $fname }} {{ $lname }}  <br>
                            @endif
                        @endforeach
                        @foreach ($paper->teacher as $teacher)
                            @if ($teacher->pivot->author_type == 2)
                                <b>{{ trans('message.Published_research_co_author') }}:</b> {{ trans('message.Published_research_first_author') }}:</b> 
                                            @php
                                                $fname = $locale == 'en' ? ($teacher->fname_en ?? $teacher->fname_th ?? $teacher->fname_cn)
                                                        : ($locale == 'th' ? ($teacher->fname_th ?? $teacher->fname_en ?? $teacher->fname_cn)
                                                        : ($teacher->fname_cn ?? $teacher->fname_en ?? $teacher->fname_th));

                                                $lname = $locale == 'en' ? ($teacher->lname_en ?? $teacher->lname_th ?? $teacher->lname_cn)
                                                        : ($locale == 'th' ? ($teacher->lname_th ?? $teacher->lname_en ?? $teacher->lname_cn)
                                                        : ($teacher->lname_cn ?? $teacher->lname_en ?? $teacher->lname_th));
                                            @endphp
                                            {{ $fname }} {{ $lname }} <br>
                            @endif
                        @endforeach

                        @foreach ($paper->author as $teacher)
                            @if ($teacher->pivot->author_type == 3)
                                <b>{{ trans('message.Published_research_corresponding_author') }}:</b>
                                @php
                                            $locale = app()->getLocale();
                                            $fname = $locale == 'en' ? ($teacher->author_fname ?? $teacher->author_fname_th ?? $teacher->author_fname_cn)
                                                    : ($locale == 'th' ? ($teacher->author_fname_th ?? $teacher->author_fname ?? $teacher->author_fname_cn)
                                                    : ($teacher->author_fname_cn ?? $teacher->author_fname ?? $teacher->author_fname_th));

                                            $lname = $locale == 'en' ? ($teacher->author_lname ?? $teacher->author_lname_th ?? $teacher->author_lname_cn)
                                                    : ($locale == 'th' ? ($teacher->author_lname_th ?? $teacher->author_lname ?? $teacher->author_lname_cn)
                                                    : ($teacher->author_lname_cn ?? $teacher->author_lname ?? $teacher->author_lname_th));
                                        @endphp
                                        {{ $fname }} {{ $lname }}  <br>
                            @endif
                        @endforeach
                        @foreach ($paper->teacher as $teacher)
                            @if ($teacher->pivot->author_type == 3)
                                <b>{{ trans('message.Published_research_corresponding_author') }}:</b>
                                @php
                                                $fname = $locale == 'en' ? ($teacher->fname_en ?? $teacher->fname_th ?? $teacher->fname_cn)
                                                        : ($locale == 'th' ? ($teacher->fname_th ?? $teacher->fname_en ?? $teacher->fname_cn)
                                                        : ($teacher->fname_cn ?? $teacher->fname_en ?? $teacher->fname_th));

                                                $lname = $locale == 'en' ? ($teacher->lname_en ?? $teacher->lname_th ?? $teacher->lname_cn)
                                                        : ($locale == 'th' ? ($teacher->lname_th ?? $teacher->lname_en ?? $teacher->lname_cn)
                                                        : ($teacher->lname_cn ?? $teacher->lname_en ?? $teacher->lname_th));
                                            @endphp
                                            {{ $fname }} {{ $lname }} <br>
                            @endif
                        @endforeach




                    </p>
                </div>

                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Published_research_journalName') }}</b></p>
                    <p class="card-text col-sm-9">
                        @php
                                                $sourcetitle = $locale == 'en' ? ($paper->paper_sourcetitle ?? $paper->paper_sourcetitle_th ?? $paper->paper_sourcetitle_cn)
                                                        : ($locale == 'th' ? ($paper->paper_sourcetitle_th ?? $paper->paper_sourcetitle ?? $paper->paper_sourcetitle_cn)
                                                        : ($paper->paper_sourcetitle_cn ?? $paper->paper_sourcetitle ?? $paper->paper_sourcetitle_th));
                                            @endphp
                                            {{ $sourcetitle }}
                    </p>
                </div>
                <div class="row mt-2">
                    @if (App::getLocale() == 'th')
                    <p class="card-text col-sm-3"><b>ปีที่ตีพิมพ์ (พ.ศ.)</b></p>
                    @else
                    <p class="card-text col-sm-3"><b>{{ trans('message.Published_research_year') }}</b></p>
                    @endif

                    @if (App::getLocale() == 'th')
                    <p class="card-text col-sm-9">{{ $paper->paper_yearpub +543 ?? $paper->paper_yearpub }}</p>
                    @else
                    <p class="card-text col-sm-9">{{ $paper->paper_yearpub }}</p>
                    @endif
                    
                </div>
                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Published_research_volume') }}</b></p>
                    <p class="card-text col-sm-9">{{ $paper->paper_volume }}</p>
                </div>
                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Published_research_issue') }}</b></p>
                    <p class="card-text col-sm-9">{{ $paper->paper_issue }}</p>
                </div>
                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Published_research_page') }}</b></p>
                    <p class="card-text col-sm-9">{{ $paper->paper_page }}</p>
                </div>
                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Published_research_doi') }}</b></p>
                    <p class="card-text col-sm-9">{{ $paper->paper_doi }}</p>
                </div>
                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Published_research_url') }}</b></p>
                    <a href="{{ $paper->paper_url }}" target="_blank"
                        class="card-text col-sm-9">{{ $paper->paper_url }}</a>
                </div>

                <a class="btn btn-primary mt-5" href="{{ route('papers.index') }}">
                    {{ trans('message.Back_button') }}</a>
            </div>
        </div>

    </div>
@endsection
