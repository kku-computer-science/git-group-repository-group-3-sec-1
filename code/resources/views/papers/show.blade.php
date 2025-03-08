@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
    <div class="container">
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title">{{ trans('message.Published_research_detail') }}</h4>
                <p class="card-description">{{ trans('message.Published_research_description') }}</p>
                <div class="row mt-3">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Published_research_title') }}</b></p>
                    <p class="card-text col-sm-9">{{ $paper->paper_name }}</p>
                </div>
                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Published_research_abstract') }}</b></p>
                    <p class="card-text col-sm-9">{{ $paper->abstract }}</p>
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
                                {{ $teacher->author_fname }} {{ $teacher->author_lname }} <br>
                            @endif
                        @endforeach
                        @foreach ($paper->teacher as $teacher)
                            @if ($teacher->pivot->author_type == 1)
                                <b>{{ trans('message.Published_research_first_author') }}:</b> {{ $teacher->fname_en }}
                                {{ $teacher->lname_en }} <br>
                            @endif
                        @endforeach

                        @foreach ($paper->author as $teacher)
                            @if ($teacher->pivot->author_type == 2)
                                <b>{{ trans('message.Published_research_co_author') }}:</b> {{ $teacher->author_fname }}
                                {{ $teacher->author_lname }} <br>
                            @endif
                        @endforeach
                        @foreach ($paper->teacher as $teacher)
                            @if ($teacher->pivot->author_type == 2)
                                <b>{{ trans('message.Published_research_co_author') }}:</b> {{ $teacher->fname_en }}
                                {{ $teacher->lname_en }} <br>
                            @endif
                        @endforeach

                        @foreach ($paper->author as $teacher)
                            @if ($teacher->pivot->author_type == 3)
                                <b>{{ trans('message.Published_research_corresponding_author') }}:</b>
                                {{ $teacher->author_fname }} {{ $teacher->author_lname }} <br>
                            @endif
                        @endforeach
                        @foreach ($paper->teacher as $teacher)
                            @if ($teacher->pivot->author_type == 3)
                                <b>{{ trans('message.Published_research_corresponding_author') }}:</b>
                                {{ $teacher->fname_en }} {{ $teacher->lname_en }} <br>
                            @endif
                        @endforeach




                    </p>
                </div>

                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Published_research_journalName') }}</b></p>
                    <p class="card-text col-sm-9">{{ $paper->paper_sourcetitle }}</p>
                </div>
                <div class="row mt-2">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Published_research_year') }}</b></p>
                    <p class="card-text col-sm-9">{{ $paper->paper_yearpub }}</p>
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
