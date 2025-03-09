@extends('dashboards.users.layouts.user-dash-layout')
@section('content')
    <style>
        .my-select {
            background-color: #fff;
            color: #212529;
            border: #000 0.2 solid;
            border-radius: 10px;
            padding: 6px 20px;
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
                <strong>{{ trans('message.error_input.Whoops') }}</strong>
                {{ trans('message.error_input.Error_problem') }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card" style="padding: 16px;">
                <div class="card-body">
                    <h4 class="card-title">{{ trans('message.Edit_other_academic_works') }}</h4>
                    <p class="card-description">{{ trans('message.Edit_other_academic_works_detail') }}</p>
                    <form class="forms-sample" action="{{ route('patents.update', $patent->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="exampleInputac_name"
                                class="col-sm-3 col-form-label">{{ trans('message.Other_academic_works_title') }} (TH)</label>
                            <div class="col-sm-9">
                                <input type="text" name="ac_name" value="{{ $patent->ac_name }}" class="form-control"
                                    placeholder="{{ trans('message.Other_academic_works_title') }}">
                            </div>
                            <label for="exampleInputac_name"
                                class="col-sm-3 col-form-label">{{ trans('message.Other_academic_works_title') }} (EN)</label>
                            <div class="col-sm-9">
                                <input type="text" name="ac_name_en" value="{{ $patent->ac_name_en }}" class="form-control"
                                    placeholder="{{ trans('message.Other_academic_works_title') }}">
                            </div>
                            <label for="exampleInputac_name"
                                class="col-sm-3 col-form-label">{{ trans('message.Other_academic_works_title') }} (CN)</label>
                            <div class="col-sm-9">
                                <input type="text" name="ac_name_cn" value="{{ $patent->ac_name_cn }}" class="form-control"
                                    placeholder="{{ trans('message.Other_academic_works_title') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputac_type"
                                class="col-sm-3 col-form-label">{{ trans('message.Other_academic_works_type') }}</label>
                            <div class="col-sm-9">
                                <select name="ac_type" class="custom-select my-select" required>
                                    <option value="">{{ trans('message.Please_choose_type') }}</option>
                                    <option value="สิทธิบัตร" {{ $patent->ac_type == 'สิทธิบัตร' ? 'selected' : '' }}>
                                        {{ trans('message.Other_academic_works_Patent') }}
                                    </option>
                                    <option value="สิทธิบัตร (การประดิษฐ์)"
                                        {{ $patent->ac_type == 'สิทธิบัตร (การประดิษฐ์)' ? 'selected' : '' }}>
                                        {{ trans('message.Other_academic_works_Patent_Invention') }}
                                    </option>
                                    <option value="สิทธิบัตร (การออกแบบผลิตภัณฑ์)"
                                        {{ $patent->ac_type == 'สิทธิบัตร (การออกแบบผลิตภัณฑ์)' ? 'selected' : '' }}>
                                        {{ trans('message.Other_academic_works_Patent_ProductDesign') }}
                                    </option>
                                    <option value="อนุสิทธิบัตร"
                                        {{ $patent->ac_type == 'อนุสิทธิบัตร' ? 'selected' : '' }}>
                                        {{ trans('message.Other_academic_works_UtilityModel') }}
                                    </option>
                                    <option value="ลิขสิทธิ์" {{ $patent->ac_type == 'ลิขสิทธิ์' ? 'selected' : '' }}>
                                        {{ trans('message.Other_academic_works_Copyright') }}
                                    </option>
                                    <option value="ลิขสิทธิ์ (วรรณกรรม)"
                                        {{ $patent->ac_type == 'ลิขสิทธิ์ (วรรณกรรม)' ? 'selected' : '' }}>
                                        {{ trans('message.Other_academic_works_Copyright_LiteraryWork') }}
                                    </option>
                                    <option value="ลิขสิทธิ์ (ตนตรีกรรม)"
                                        {{ $patent->ac_type == 'ลิขสิทธิ์ (ตนตรีกรรม)' ? 'selected' : '' }}>
                                        {{ trans('message.Other_academic_works_Copyright_Music') }}
                                    </option>
                                    <option value="ลิขสิทธิ์ (ภาพยนตร์)"
                                        {{ $patent->ac_type == 'ลิขสิทธิ์ (ภาพยนตร์)' ? 'selected' : '' }}>
                                        {{ trans('message.Other_academic_works_Copyright_Film') }}
                                    </option>
                                    <option value="ลิขสิทธิ์ (ศิลปกรรม)"
                                        {{ $patent->ac_type == 'ลิขสิทธิ์ (ศิลปกรรม)' ? 'selected' : '' }}>
                                        {{ trans('message.Other_academic_works_Copyright_Art') }}
                                    </option>
                                    <option value="ลิขสิทธิ์ (งานแพร่เสี่ยงแพร่ภาพ)"
                                        {{ $patent->ac_type == 'ลิขสิทธิ์ (งานแพร่เสี่ยงแพร่ภาพ)' ? 'selected' : '' }}>
                                        {{ trans('message.Other_academic_works_Copyright_Broadcast') }}
                                    </option>
                                    <option value="ลิขสิทธิ์ (โสตทัศนวัสดุ)"
                                        {{ $patent->ac_type == 'ลิขสิทธิ์ (โสตทัศนวัสดุ)' ? 'selected' : '' }}>
                                        {{ trans('message.Other_academic_works_Copyright_AudioVisualWork') }}
                                    </option>
                                    <option value="ลิขสิทธิ์ (งานอื่นใดในแผนกวรรณคดี/วิทยาศาสตร์/ศิลปะ)"
                                        {{ $patent->ac_type == 'ลิขสิทธิ์ (งานอื่นใดในแผนกวรรณคดี/วิทยาศาสตร์/ศิลปะ)' ? 'selected' : '' }}>
                                        {{ trans('message.Other_academic_works_Copyright_Other_Works') }}
                                    </option>
                                    </option>
                                    <option value="ลิขสิทธิ์ (สิ่งบันทึกเสียง)"
                                        {{ $patent->ac_type == 'ลิขสิทธิ์ (สิ่งบันทึกเสียง)' ? 'selected' : '' }}>
                                        {{ trans('message.Other_academic_works_Copyright_SoundRecording') }}
                                    </option>

                                    <option value="อื่น ๆ" {{ $patent->ac_type == 'อื่น ๆ' ? 'selected' : '' }}>
                                        {{ trans('message.Other_academic_works_other') }}
                                    </option>
                                    <option value="ความลับทางการค้า"
                                        {{ $patent->ac_type == 'ความลับทางการค้า' ? 'selected' : '' }}>
                                        {{ trans('message.Other_academic_works_Trade_Secret') }}
                                    </option>
                                    <option value="เครื่องหมายการค้า"
                                        {{ $patent->ac_type == 'เครื่องหมายการค้า' ? 'selected' : '' }}>
                                        {{ trans('message.Other_academic_works_Trade_Mark') }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputac_year"
                                class="col-sm-3 col-form-label">{{ trans('message.Other_academic_works_date_copyright') }}</label>
                            <div class="col-sm-9">
                                <input type="date" name="ac_year" value="{{ $patent->ac_year }}" class="form-control"
                                    placeholder="{{ trans('message.Other_academic_works_date_copyright') }}<">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputac_refnumber"
                                class="col-sm-3 col-form-label">{{ trans('message.Other_academic_registration_no') }}</label>
                            <div class="col-sm-9">
                                <input type="text" name="ac_refnumber" value="{{ $patent->ac_refnumber }}"
                                    class="form-control"
                                    placeholder="{{ trans('message.Other_academic_registration_no') }}">
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="exampleInputac_author" class="col-sm-3 col-form-label">ชื่อผู้รับผิดชอบ</label>
                            <div class="col-sm-9">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dynamic_field">
                                        <tr>
                                            <td></td>
                                            
                                            <td><button type="button" name="add" id="add" class="btn btn-success btn-sm add"><i class="fas fa-plus"></i></button></td>
                                        </tr>
                                    </table>
                                    <!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
                                </div>
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <label
                                class="col-sm-3 col-form-label">{{ trans('message.Other_academic_works_teacher_in_field') }}</label>
                            <div class="col-sm-9">
                                <table class="table table-bordered " id="dynamicAddRemove">
                                    <tr>
                                        <th><button type="button" name="add" id="add-btn2"
                                                class="btn btn-success btn-sm add"><i class="mdi mdi-plus"></i></button>
                                        </th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInput"
                                class="col-sm-3 ">{{ trans('message.Other_academic_works_outsider') }}</label>
                            <div class="col-sm-9">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dynamic_field">

                                        <tr>
                                            <td><button type="button" name="add" id="add"
                                                    class="btn btn-success btn-sm"><i class="fas fa-plus"></i></button>
                                            </td>
                                        </tr>

                                    </table>
                                    <!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" /> -->
                                </div>
                            </div>
                        </div>

                        <button type="submit"
                            class="btn btn-primary me-2 mt-5">{{ trans('message.Submit_button') }}</button>
                        <a class="btn btn-light mt-5"
                            href="{{ route('patents.index') }}">{{ trans('message.Cancle_button') }}</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {


            var patent = <?php echo $patent->user; ?>;
            var i = 0;

            for (i = 0; i < patent.length; i++) {
                console.log(patent);
                var obj = patent[i];
                $("#dynamicAddRemove").append('<tr><td><select id="selUser' + i + '" name="moreFields[' + i +
    '][userid]" style="width: 200px;"><option value="">{{ trans("message.Select_user_option") }}</option>@foreach($users as $user)@php $locale = app()->getLocale(); $fname = $locale == "en" ? ($user->fname_en ?? $user->fname_th ?? $user->fname_cn) : ($locale == "th" ? ($user->fname_th ?? $user->fname_en ?? $user->fname_cn) : ($user->fname_cn ?? $user->fname_en ?? $user->fname_th)); $lname = $locale == "en" ? ($user->lname_en ?? $user->lname_th ?? $user->lname_cn) : ($locale == "th" ? ($user->lname_th ?? $user->lname_en ?? $user->lname_cn) : ($user->lname_cn ?? $user->lname_en ?? $user->lname_th)); @endphp<option value="{{ $user->id }}">{{ $fname }} {{ $lname }}</option>@endforeach</select></td><td><button type="button" class="btn btn-danger btn-sm remove-tr"><i class="mdi mdi-minus"></i></button></td></tr>');

                document.getElementById("selUser" + i).value = obj.id;
                $("#selUser" + i).select2()


                //document.getElementById("#dynamicAddRemove").value = "10";
            }
            $("#add-btn2").click(function() {
                ++i;
                $("#dynamicAddRemove").append('<tr><td><select id="selUser' + i + '" name="moreFields[' + i +
    '][userid]" style="width: 200px;"><option value="">{{ trans("message.Select_user_option") }}</option>@foreach($users as $user)@php $locale = app()->getLocale(); $fname = $locale == "en" ? ($user->fname_en ?? $user->fname_th ?? $user->fname_cn) : ($locale == "th" ? ($user->fname_th ?? $user->fname_en ?? $user->fname_cn) : ($user->fname_cn ?? $user->fname_en ?? $user->fname_th)); $lname = $locale == "en" ? ($user->lname_en ?? $user->lname_th ?? $user->lname_cn) : ($locale == "th" ? ($user->lname_th ?? $user->lname_en ?? $user->lname_cn) : ($user->lname_cn ?? $user->lname_en ?? $user->lname_th)); @endphp<option value="{{ $user->id }}">{{ $fname }} {{ $lname }}</option>@endforeach</select></td><td><button type="button" class="btn btn-danger btn-sm remove-tr"><i class="mdi mdi-minus"></i></button></td></tr>');

                $("#selUser" + i).select2()

            });
            $(document).on('click', '.remove-tr', function() {
                $(this).parents('tr').remove();
            });

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var patent = <?php echo $patent->author; ?>;

            var postURL = "<?php echo url('addmore'); ?>";
            var i = 0;
            //console.log(patent)

            for (i = 0; i < patent.length; i++) {
                //console.log(patent);
                var obj = patent[i];
                $("#dynamic_field").append(`
                    <tr id="row${i}" class="dynamic-added">
                        <td>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                            <input type="text" name="fname" value="${obj.author_fname || ''}" placeholder="{{ trans('message.your_name') }} (EN)" class="form-control name_list" />
                            </div>
                            <div class="col-md-6 mb-2">
                            <input type="text" name="lname" value="${obj.author_lname || ''}" placeholder="{{ trans('message.your_surname') }} (EN)" class="form-control name_list" />
                            </div>
                            <div class="col-md-6 mb-2">
                            <input type="text" name="fname_th" value="${obj.author_fname_th || ''}" placeholder="{{ trans('message.your_name') }} (TH)" class="form-control name_list" />
                            </div>
                            <div class="col-md-6 mb-2">
                            <input type="text" name="lname_th" value="${obj.author_lname_th || ''}" placeholder="{{ trans('message.your_surname') }} (TH)" class="form-control name_list" />
                            </div>
                            <div class="col-md-6 mb-2">
                            <input type="text" name="fname_cn" value="${obj.author_fname_cn || ''}" placeholder="{{ trans('message.your_name') }} (CN)" class="form-control name_list" />
                            </div>
                            <div class="col-md-6 mb-2">
                            <input type="text" name="lname_cn" value="${obj.author_lname_cn || ''}" placeholder="{{ trans('message.your_surname') }} (CN)" class="form-control name_list" />
                            </div>
                        </div>
                        </td>
                        <td>
                        <button type="button" name="remove" id="' + i + '" class="btn btn-danger btn-sm btn_remove">X</button>
                        </td>
                    </tr>
                    `);
                //document.getElementById("selUser" + i).value = obj.id;
                //console.log(obj.author_fname)
                // let doc=document.getElementById("row" + i)
                // doc.setAttribute('fname','aaa');
                // doc.setAttribute('lname','bbb');
                //document.getElementById("row" + i).value = obj.author_lname;
                //document.getAttribute("lname").value = obj.author_lname;
                //$("#selUser" + i).select2()


                //document.getElementById("#dynamicAddRemove").value = "10";
            }

            $('#add').click(function() {
                i++;
                $('#dynamic_field').append(`
                <tr id="row${i}" class="dynamic-added">
                    <td>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                        <input type="text" name="fname[]" placeholder="{{ trans('message.your_name') }} (TH)" class="form-control name_list" />
                        </div>
                        <div class="col-md-6 mb-2">
                        <input type="text" name="lname[]" placeholder="{{ trans('message.your_surname') }} (TH)" class="form-control name_list" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                        <input type="text" name="fname_en[]" placeholder="{{ trans('message.your_name') }} (EN)" class="form-control name_list" />
                        </div>
                        <div class="col-md-6 mb-2">
                        <input type="text" name="lname_en[]" placeholder="{{ trans('message.your_surname') }} (EN)" class="form-control name_list" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                        <input type="text" name="fname_cn[]" placeholder="{{ trans('message.your_name') }} (CN)" class="form-control name_list" />
                        </div>
                        <div class="col-md-6 mb-2">
                        <input type="text" name="lname_cn[]" placeholder="{{ trans('message.your_surname') }} (CN)" class="form-control name_list" />
                        </div>
                    </div>
                    </td>
                    <td>
                    <button type="button" name="remove" id="${i}" class="btn btn-danger btn-sm btn_remove">X</button>
                    </td>
                </tr>
                `);
            });

            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });

        });
    </script>
@endsection
