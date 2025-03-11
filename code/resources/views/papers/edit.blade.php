@extends('dashboards.users.layouts.user-dash-layout')
@section('content')
<style type="text/css">
    .dropdown-toggle .filter-option {
        height: 40px;
        width: 400px !important;
        color: #212529;
        background-color: #fff;
        border-width: 0.2;
        border-style: solid;
        border-color: -internal-light-dark(rgb(118, 118, 118), rgb(133, 133, 133));
        border-radius: 5px;
        padding: 4px 10px;
    }

    .my-select {
        background-color: #fff;
        color: #212529;
        border: #000 0.2 solid;
        border-radius: 5px;
        padding: 4px 10px;
        width: 100%;
        font-size: 14px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>{{ trans('message.error_input.Whoops') }}</strong> {{ trans('message.error_input.Error_problem') }}<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title">{{ trans('message.Edit_published_research') }}</h4>
                <p class="card-description">{{ trans('message.Edit_published_research_detail') }}</p>
                <form class="forms-sample" action="{{ route('papers.update',$paper->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <p class="col-sm-3"><b>{{ trans('message.Published_research_source') }}</b></p>
                        <div class="col-sm-8">
                            {!! Form::select('sources[]', $sources, $paperSource, array('class' => 'selectpicker','multiple data-live-search'=>"true")) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_name" class="col-sm-3 col-form-label">{{ trans('message.Published_research_title') }} (EN)</label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_name" value="{{ $paper->paper_name }}" class="form-control" placeholder="{{ trans('message.Published_research_title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_name" class="col-sm-3 col-form-label">{{ trans('message.Published_research_title') }} (TH)</label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_name_th" value="{{ $paper->paper_name_th }}" class="form-control" placeholder="{{ trans('message.Published_research_title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_name" class="col-sm-3 col-form-label">{{ trans('message.Published_research_title') }} (CN)</label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_name_cn" value="{{ $paper->paper_name_cn }}" class="form-control" placeholder="{{ trans('message.Published_research_title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputabstract" class="col-sm-3 col-form-label">{{ trans('message.Published_research_abstract') }} (EN)</label>
                        <div class="col-sm-9">
                            <textarea type="text" name="abstract" placeholder="abstract" class="form-control form-control-lg" style="height:150px" >{{ $paper->abstract }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputabstract" class="col-sm-3 col-form-label">{{ trans('message.Published_research_abstract') }} (TH)</label>
                        <div class="col-sm-9">
                            <textarea type="text" name="abstract_th" placeholder="abstract" class="form-control form-control-lg" style="height:150px" >{{ $paper->abstract_th }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputabstract" class="col-sm-3 col-form-label">{{ trans('message.Published_research_abstract') }} (CN)</label>
                        <div class="col-sm-9">
                            <textarea type="text" name="abstract_cn" placeholder="abstract" class="form-control form-control-lg" style="height:150px" >{{ $paper->abstract_cn }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="exampleInputkeyword" class="col-sm-3 col-form-label">{{ trans('message.Published_research_keyword') }}</label>
                        <div class="col-sm-9">
                            <input type="text" name="keyword" value="{{ $paper->keyword }}" class="form-control" placeholder="{{ trans('message.Published_research_keyword') }}">
                            <p class="text-danger">***{{ trans('message.Published_research_keyword_suggested') }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_sourcetitle" class="col-sm-3 col-form-label">{{ trans('message.Published_research_journalName') }} (EN)</label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_sourcetitle" value="{{ $paper->paper_sourcetitle }}" class="form-control" placeholder="{{ trans('message.Published_research_journalName') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_sourcetitle" class="col-sm-3 col-form-label">{{ trans('message.Published_research_journalName') }} (TH)</label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_sourcetitle_th" value="{{ $paper->paper_sourcetitle_th }}" class="form-control" placeholder="{{ trans('message.Published_research_journalName') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_sourcetitle" class="col-sm-3 col-form-label">{{ trans('message.Published_research_journalName') }} (CN)</label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_sourcetitle_cn" value="{{ $paper->paper_sourcetitle_cn }}" class="form-control" placeholder="{{ trans('message.Published_research_journalName') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_type" class="col-sm-3 col-form-label">{{ trans('message.Published_research_journalType') }}</label>
                        <div class="col-sm-9">
                            <select id='paper_type' class="custom-select my-select" style='width: 200px;' name="paper_type">
                                <option value="Journal" {{ "Journal" == $paper->paper_type ? 'selected' : '' }}>{{ trans('message.Published_research_journal') }}</option>
                                <option value="Conference Proceeding" {{ "Conference Proceeding" == $paper->paper_type ? 'selected' : '' }}>{{ trans('message.Published_research_conference') }}</option>
                                <option value="Book Series" {{ "Book Series" == $paper->paper_type ? 'selected' : '' }}>{{ trans('message.Published_research_book_series') }}</option>
                                <option value="Book" {{ "Book" == $paper->paper_type ? 'selected' : '' }}>{{ trans('message.Published_research_book') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_subtype" class="col-sm-3 col-form-label">{{ trans('message.Published_research_documentType') }}<</label>
                        <div class="col-sm-9">
                            <select id='paper_subtype' class="custom-select my-select" style='width: 200px;' name="paper_subtype">
                                <option value="Article" {{ "Article" == $paper->paper_subtype ? 'selected' : '' }}>{{ trans('message.Published_research_document_type_article') }}</option>
                                <option value="Conference Paper" {{ "Conference Paper" == $paper->paper_subtype ? 'selected' : '' }}>{{ trans('message.Published_research_document_type_conference') }}</option>
                                <option value="Editorial" {{ "Editorial" == $paper->paper_subtype ? 'selected' : '' }}>{{ trans('message.Published_research_document_type_editorial') }}</option>
                                <option value="Book Chapter" {{ "Book Chapter" == $paper->paper_subtype ? 'selected' : '' }}>{{ trans('message.Published_research_document_type_bookchapter') }}</option>
                                <option value="Erratum" {{ "Erratum" == $paper->paper_subtype ? 'selected' : '' }}>{{ trans('message.Published_research_document_type_erratum') }}</option>
                                <option value="Review" {{ "Review" == $paper->paper_subtype ? 'selected' : '' }}>{{ trans('message.Published_research_document_type_review') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpublication" class="col-sm-3 col-form-label">{{ trans('message.Published_research_publication') }}</label>
                        <div class="col-sm-9">
                            <select id='publication' class="custom-select my-select" style='width: 200px;' name="publication">
                                <option value="International Journal" {{ "International Journal" == $paper->publication ? 'selected' : '' }}>{{ trans('message.Published_research_publication_international_journal') }}</option>
                                <option value="International Book" {{ "International Book" == $paper->publication ? 'selected' : '' }}>{{ trans('message.Published_research_publication_international_book') }}</option>
                                <option value="International Conference" {{ "International Conference" == $paper->publication ? 'selected' : '' }}>{{ trans('message.Published_research_publication_international_conference') }}</option>
                                <option value="National Conference" {{ "National Conference" == $paper->publication ? 'selected' : '' }}>{{ trans('message.Published_research_publication_national_conference') }}</option>
                                <option value="National Journal" {{ "National Journal" == $paper->publication ? 'selected' : '' }}> {{ trans('message.Published_research_publication_national_journal') }}</option>
                                <option value="National Book" {{ "National Book" == $paper->publication ? 'selected' : '' }}> {{ trans('message.Published_research_publication_national_book') }}</option>
                                <option value="National Magazine" {{ "National Magazine" == $paper->publication ? 'selected' : '' }}>{{ trans('message.Published_research_publication_national_magazine') }}</option>
                                <option value="Book Chapter" {{ "Book Chapter" == $paper->publication ? 'selected' : '' }}> {{ trans('message.Published_research_publication_book_chapter') }}</option>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label for="exampleInputpaper_url" class="col-sm-3 col-form-label">Url</label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_url" value="{{ $paper->paper_url }}" class="form-control" placeholder="paper_url">
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <label for="exampleInputpaper_yearpub" class="col-sm-3 col-form-label">{{ trans('message.Published_research_year') }}</label>
                        <div class="col-sm-9">
                            <input type="number" name="paper_yearpub" value="{{ $paper->paper_yearpub }}" class="form-control" placeholder="{{ trans('message.Published_research_year') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_volume" class="col-sm-3 col-form-label">{{ trans('message.Published_research_volume') }}</label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_volume" value="{{ $paper->paper_volume }}" class="form-control" placeholder="{{ trans('message.Published_research_volume') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_issue" class="col-sm-3 col-form-label">{{ trans('message.Published_research_issue') }}</label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_issue" value="{{ $paper->paper_issue }}" class="form-control" placeholder="{{ trans('message.Published_research_issue') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_citation" class="col-sm-3 col-form-label">{{ trans('message.Published_research_citation_count') }}</label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_citation" value="{{ $paper->paper_citation }}" class="form-control" placeholder="{{ trans('message.Published_research_citation_count') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_page" class="col-sm-3 col-form-label">{{ trans('message.Published_research_page') }}</label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_page" value="{{ $paper->paper_page }}" class="form-control" placeholder="{{ trans('message.Published_research_page') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_doi" class="col-sm-3 col-form-label">{{ trans('message.Published_research_doi') }}</label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_doi" value="{{ $paper->paper_doi }}" class="form-control" placeholder="{{ trans('message.Published_research_doi') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_funder" class="col-sm-3 col-form-label">{{ trans('message.Published_research_funder') }} (EN)</label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_funder" value="{{ $paper->paper_funder }}" class="form-control" placeholder="{{ trans('message.Published_research_funder') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_funder" class="col-sm-3 col-form-label">{{ trans('message.Published_research_funder') }} (TH)</label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_funder_th" value="{{ $paper->paper_funder_th }}" class="form-control" placeholder="{{ trans('message.Published_research_funder') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_funder" class="col-sm-3 col-form-label">{{ trans('message.Published_research_funder') }} (CN)</label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_funder_cn" value="{{ $paper->paper_funder_cn }}" class="form-control" placeholder="{{ trans('message.Published_research_funder') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_url" class="col-sm-3 col-form-label">{{ trans('message.Published_research_url') }}</label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_url" value="{{ $paper->paper_url }}" class="form-control" placeholder="{{ trans('message.Published_research_url') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_doi" class="col-sm-3 ">{{ trans('message.Published_research_internal_author') }}</label>
                        <div class="col-sm-9">
                            <div class="table-responsive">
                                <table class="table " id="dynamicAddRemove">
                                    <tr>
                                        <td><button type="button" name="add" id="add-btn2" class="btn btn-success btn-sm "><i class="mdi mdi-plus"></i></button></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_author" class="col-sm-3 col-form-label">{{ trans('message.Published_research_external_author') }}</label>
                        <div class="col-sm-9">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dynamic_field">

                                    <tr>
                                        <td><button type="button" name="add" id="add" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></button>
                                        </td>
                                    </tr>

                                </table>
                                <!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" /> -->
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">{{ trans('message.Submit_button') }}</button>
                    <a class="btn btn-light" href="{{ route('papers.index') }}">{{ trans('message.Cancle_button') }}</a>
                </form>
            </div>
        </div>
    </div>

</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        $("#head0").select2()
        $("#fund").select2()
        //$("#selUser0").select2()
        var papers = <?php echo $paper['teacher']; ?>;
        var i = 0;
        console.log(papers);
        for (i = 0; i < papers.length; i++) {
            var obj = papers[i];
//console.log(obj.pivot.author_type)

            $("#dynamicAddRemove").append('<tr><td><select id="selUser' + i + '" name="moreFields[' + i +
                '][userid]" style="width: 200px;"><option value="">{{ trans("message.Select_user_option") }}</option>@foreach($users as $user)@php $locale = app()->getLocale(); $fname = $locale == "en" ? ($user->fname_en ?? $user->fname_th ?? $user->fname_cn) : ($locale == "th" ? ($user->fname_th ?? $user->fname_en ?? $user->fname_cn) : ($user->fname_cn ?? $user->fname_en ?? $user->fname_th)); $lname = $locale == "en" ? ($user->lname_en ?? $user->lname_th ?? $user->lname_cn) : ($locale == "th" ? ($user->lname_th ?? $user->lname_en ?? $user->lname_cn) : ($user->lname_cn ?? $user->lname_en ?? $user->lname_th)); @endphp<option value="{{ $user->id }}">{{ $fname }} {{ $lname }}</option>@endforeach</select></td><td><select id="pos' + i + '" class="custom-select my-select" style="width: 200px;" name="pos[]"><option value="1">{{ trans('message.First_Author') }}</option><option value="2">{{ trans('message.Co-Author') }}</option><option value="3">{{ trans('message.Corresponding_Author') }}</option></select></td><td><button type="button" class="btn btn-danger btn-sm remove-tr"><i class="mdi mdi-minus"></i></button></td></tr>'
            );

            document.getElementById("selUser" + i).value = obj.id;
            document.getElementById("pos" + i).value = obj.pivot.author_type;
            $("#selUser" + i).select2()


            //document.getElementById("#dynamicAddRemove").value = "10";
        }


        $("#add-btn2").click(function() {

            ++i;
            $("#dynamicAddRemove").append('<tr><td><select id="selUser' + i + '" name="moreFields[' + i +
                '][userid]" style="width: 200px;"><option value="">{{ trans("message.Select_user_option") }}</option>@foreach($users as $user)@php $locale = app()->getLocale(); $fname = $locale == "en" ? ($user->fname_en ?? $user->fname_th ?? $user->fname_cn) : ($locale == "th" ? ($user->fname_th ?? $user->fname_en ?? $user->fname_cn) : ($user->fname_cn ?? $user->fname_en ?? $user->fname_th)); $lname = $locale == "en" ? ($user->lname_en ?? $user->lname_th ?? $user->lname_cn) : ($locale == "th" ? ($user->lname_th ?? $user->lname_en ?? $user->lname_cn) : ($user->lname_cn ?? $user->lname_en ?? $user->lname_th)); @endphp<option value="{{ $user->id }}">{{ $fname }} {{ $lname }}</option>@endforeach</select></td><td><select id="pos' + i + '" class="custom-select my-select" style="width: 200px;" name="pos[]"><option value="1">{{ trans('message.First_Author') }}</option><option value="2">{{ trans('message.Co-Author') }}</option><option value="3">{{ trans('message.Corresponding_Author') }}</option></select></td><td><button type="button" class="btn btn-danger btn-sm remove-tr"><i class="mdi mdi-minus"></i></button></td></tr>'
            );
            $("#selUser" + i).select2()
        });


        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });

    });
</script>
<script>
    $(document).ready(function() {
        var patent = <?php echo $paper->author; ?>;

        var postURL = "<?php echo url('addmore'); ?>";
        var i = 0;
        //console.log(patent)

        for (i = 0; i < patent.length; i++) {
            //console.log(patent);
            var obj2 = patent[i];
            console.log(obj2.pivot.author_type)
            $("#dynamic_field").append('<tr id="row' + i +
    '" class="dynamic-added"><td><input type="text" name="fname[]" value="' + obj2.author_fname + '" placeholder="{{ trans("message.your_name") }} (EN)" class="form-control name_list" /><input type="text" name="fname_th[]" value="' + obj2.author_fname_th + '" placeholder="{{ trans("message.your_name") }} (TH)" class="form-control name_list" /><input type="text" name="fname_cn[]" value="' + obj2.author_fname_cn + '" placeholder="{{ trans("message.your_name") }} (CN)" class="form-control name_list" /></td><td><input type="text" name="lname[]" value="' + obj2.author_lname + '" placeholder="{{ trans("message.your_surname") }} (EN)" class="form-control name_list" /><input type="text" name="lname_th[]" value="' + obj2.author_lname_th + '" placeholder="{{ trans("message.your_surname") }} (TH)" class="form-control name_list" /><input type="text" name="lname_cn[]" value="' + obj2.author_lname_cn + '" placeholder="{{ trans("message.your_surname") }} (CN)" class="form-control name_list" /></td><td><select id="poss' + i + '" class="custom-select my-select" style="width: 200px;" name="pos2[]"><option value="1">{{ trans("message.First_Author") }}</option><option value="2">{{ trans("message.Co-Author") }}</option><option value="3">{{ trans("message.Corresponding_Author") }}</option></select></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn-sm btn_remove"><i class="mdi mdi-minus"></i></button></td></tr>');

            //document.getElementById("selUser" + i).value = obj.id;
            //console.log(obj.author_fname)
            // let doc=document.getElementById("row" + i)
            // doc.setAttribute('fname','aaa');
            // doc.setAttribute('lname','bbb');
            //document.getElementById("row" + i).value = obj.author_lname;
            //document.getAttribute("lname").value = obj.author_lname;
            //$("#selUser" + i).select2()
            document.getElementById("poss" + i).value = obj2.pivot.author_type;

            //document.getElementById("#dynamicAddRemove").value = "10";
        }

        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i +
                '" class="dynamic-added"><td><input type="text" name="fname[]" placeholder="{{ trans('message.your_name') }} (EN)" class="form-control name_list" /><input type="text" name="fname[]_th" placeholder="{{ trans('message.your_surname') }} (TH)" class="form-control name_list" /><input type="text" name="fname[]" placeholder="{{ trans('message.your_name') }} (CN)" class="form-control name_list" /></td><td><input type="text" name="lname[]" placeholder="{{ trans('message.your_surname') }} (EN)" class="form-control name_list" /><input type="text" name="lname[]_th" placeholder="{{ trans('message.your_name') }} (TH)" class="form-control name_list" /><input type="text" name="lname[]_cn" placeholder="{{ trans('message.your_surname') }} (CN)" class="form-control name_list" /></td><td><select id="pos2" class="custom-select my-select" style="width: 200px;" name="pos2[]"><option value="1">{{ trans('message.First_Author') }}</option><option value="2">{{ trans('message.Co-Author') }}</option><option value="3">{{ trans('message.Corresponding_Author') }}</option></select></td><td><button type="button" name="remove" id="' +
                i + '" class="btn btn-danger btn-sm btn_remove">X</button></td></tr>');
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

    });
</script>

@endsection
<!-- <form action="{{ route('papers.update',$paper->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $paper->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $paper->detail }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form> -->