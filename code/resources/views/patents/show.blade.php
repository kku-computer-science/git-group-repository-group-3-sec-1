@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
    <div class="container">
        <div class="card col-md-8" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title">{{ trans('message.Other_academic_works_detail') }}</h4>
                <p class="card-description">{{ trans('message.Other_academic_works_description') }}</p>
                <div class="row">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Other_academic_works_title') }}</b></p>
                    <p class="card-text col-sm-9">{{ $patent->ac_name }}</p>
                </div>
                <div class="row">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Other_academic_works_type') }}</b></p>
                    <p class="card-text col-sm-9">
                        @if (App::getLocale() == 'th')
                            @if ($patent->ac_type == 'สิทธิบัตร')
                                {{ trans('message.Other_academic_works_Patent') }}
                            @elseif($patent->ac_type == 'สิทธิบัตร (การประดิษฐ์)')
                                {{ trans('message.Other_academic_works_Patent_Invention') }}
                            @elseif($patent->ac_type == 'สิทธิบัตร (การออกแบบผลิตภัณฑ์)')
                                {{ trans('message.Other_academic_works_Patent_ProductDesign') }}
                            @elseif($patent->ac_type == 'อนุสิทธิบัตร')
                                {{ trans('message.Other_academic_works_UtilityModel') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์')
                                {{ trans('message.Other_academic_works_Copyright') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์ (วรรณกรรม)')
                                {{ trans('message.Other_academic_works_Copyright_LiteraryWork') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์ (ตนตรีกรรม)')
                                {{ trans('message.Other_academic_works_Copyright_Music') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์ (ภาพยนตร์)')
                                {{ trans('message.Other_academic_works_Copyright_Film') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์ (ศิลปกรรม)')
                                {{ trans('message.Other_academic_works_Copyright_Art') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์ (งานแพร่เสี่ยงแพร่ภาพ)')
                                {{ trans('message.Other_academic_works_Copyright_Broadcast') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์ (โสตทัศนวัสดุ)')
                                {{ trans('message.Other_academic_works_Copyright_AudioVisualWork') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์ (งานอื่นใดในแผนกวรรณคดี/วิทยาศาสตร์/ศิลปะ)')
                                {{ trans('message.Other_academic_works_Copyright_Other_Works') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์ (สิ่งบันทึกเสียง)')
                                {{ trans('message.Other_academic_works_Copyright_SoundRecording') }}
                            @elseif($patent->ac_type == 'ความลับทางการค้า')
                                {{ trans('message.Other_academic_works_Trade_Secret') }}
                            @elseif($patent->ac_type == 'เครื่องหมายการค้า')
                                {{ trans('message.Other_academic_works_Trade_Mark') }}
                            @endif
                        @elseif(App::getLocale() == 'en')
                            @if ($patent->ac_type == 'สิทธิบัตร')
                                {{ trans('message.Other_academic_works_Patent') }}
                            @elseif($patent->ac_type == 'สิทธิบัตร (การประดิษฐ์)')
                                {{ trans('message.Other_academic_works_Patent_Invention') }}
                            @elseif($patent->ac_type == 'สิทธิบัตร (การออกแบบผลิตภัณฑ์)')
                                {{ trans('message.Other_academic_works_Patent_ProductDesign') }}
                            @elseif($patent->ac_type == 'อนุสิทธิบัตร')
                                {{ trans('message.Other_academic_works_UtilityModel') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์')
                                {{ trans('message.Other_academic_works_Copyright') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์ (วรรณกรรม)')
                                {{ trans('message.Other_academic_works_Copyright_LiteraryWork') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์ (ตนตรีกรรม)')
                                {{ trans('message.Other_academic_works_Copyright_Music') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์ (ภาพยนตร์)')
                                {{ trans('message.Other_academic_works_Copyright_Film') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์ (ศิลปกรรม)')
                                {{ trans('message.Other_academic_works_Copyright_Art') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์ (งานแพร่เสี่ยงแพร่ภาพ)')
                                {{ trans('message.Other_academic_works_Copyright_Broadcast') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์ (โสตทัศนวัสดุ)')
                                {{ trans('message.Other_academic_works_Copyright_AudioVisualWork') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์ (งานอื่นใดในแผนกวรรณคดี/วิทยาศาสตร์/ศิลปะ)')
                                {{ trans('message.Other_academic_works_Copyright_Other_Works') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์ (สิ่งบันทึกเสียง)')
                                {{ trans('message.Other_academic_works_Copyright_SoundRecording') }}
                            @elseif($patent->ac_type == 'ความลับทางการค้า')
                                {{ trans('message.Other_academic_works_Trade_Secret') }}
                            @elseif($patent->ac_type == 'เครื่องหมายการค้า')
                                {{ trans('message.Other_academic_works_Trade_Mark') }}
                            @endif
                        @elseif(App::getLocale() == 'cn')
                            @if ($patent->ac_type == 'สิทธิบัตร')
                                {{ trans('message.Other_academic_works_Patent') }}
                            @elseif($patent->ac_type == 'สิทธิบัตร (การประดิษฐ์)')
                                {{ trans('message.Other_academic_works_Patent_Invention') }}
                            @elseif($patent->ac_type == 'สิทธิบัตร (การออกแบบผลิตภัณฑ์)')
                                {{ trans('message.Other_academic_works_Patent_ProductDesign') }}
                            @elseif($patent->ac_type == 'อนุสิทธิบัตร')
                                {{ trans('message.Other_academic_works_UtilityModel') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์')
                                {{ trans('message.Other_academic_works_Copyright') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์ (วรรณกรรม)')
                                {{ trans('message.Other_academic_works_Copyright_LiteraryWork') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์ (ตนตรีกรรม)')
                                {{ trans('message.Other_academic_works_Copyright_Music') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์ (ภาพยนตร์)')
                                {{ trans('message.Other_academic_works_Copyright_Film') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์ (ศิลปกรรม)')
                                {{ trans('message.Other_academic_works_Copyright_Art') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์ (งานแพร่เสี่ยงแพร่ภาพ)')
                                {{ trans('message.Other_academic_works_Copyright_Broadcast') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์ (โสตทัศนวัสดุ)')
                                {{ trans('message.Other_academic_works_Copyright_AudioVisualWork') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์ (งานอื่นใดในแผนกวรรณคดี/วิทยาศาสตร์/ศิลปะ)')
                                {{ trans('message.Other_academic_works_Copyright_Other_Works') }}
                            @elseif($patent->ac_type == 'ลิขสิทธิ์ (สิ่งบันทึกเสียง)')
                                {{ trans('message.Other_academic_works_Copyright_SoundRecording') }}
                            @elseif($patent->ac_type == 'ความลับทางการค้า')
                                {{ trans('message.Other_academic_works_Trade_Secret') }}
                            @elseif($patent->ac_type == 'เครื่องหมายการค้า')
                                {{ trans('message.Other_academic_works_Trade_Mark') }}
                            @endif
                        @endif
                    </p>
                </div>
                <div class="row">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Other_academic_registration_date') }}</b></p>
                    <p class="card-text col-sm-9">{{ $patent->ac_year }}</p>
                </div>
                <div class="row">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Other_academic_registration_no') }}</b></p>
                    <p class="card-text col-sm-9">{{ trans('message.Other_academic_registration_number') }} :
                        {{ $patent->ac_refnumber }}</p>
                </div>
                <div class="row">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Other_academic_works_author') }}</b></p>
                    <p class="card-text col-sm-9">
                        @foreach ($patent->user as $a)
                            {{ $a->fname_th }} {{ $a->lname_th }}
                            @if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </p>
                </div>
                <div class="row">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Other_academic_works_co-author') }}</b></p>
                    <p class="card-text col-sm-9">
                        @foreach ($patent->author as $a)
                            {{ $a->author_fname }} {{ $a->author_lname }}
                            @if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </p>
                </div>

                <div class="pull-right mt-5">
                    <a class="btn btn-primary btn-sm" href="{{ route('patents.index') }}">
                        {{ trans('message.Back_button') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
