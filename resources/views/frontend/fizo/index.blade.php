@extends('frontend.layouts.fizo')

@section('title', 'Офицеру.ру - Правовая поддержка военнослужащих')
@section('h1','')

@section('vendor-styles')
@endsection

@section('page-styles')
@endsection



@section('content')

    <div class="container">
        <div class="py-5 text-center">
            <h1 class="">Онлайн калькулятор <span class="text-primary text-highlight-warning">НФП - 2023</span> </h1>
            <p class="">по физической подготовке военнослужащим Минобороны с 2023 г.<br>
                согласно новому наставлению по физподготовке<br>
            </p>
        </div>

        <div class="row g-3">
            <div class="col-md-7 col-lg-8">
                <h3 class="mb-3"><span class="badge bg-success">1. </span> <span class="text-primary text-highlight-primary">Вводные</span> данные</h3>

                <div class="row g-3">
                    <div class="col-6">
                        <label for="sex" class="form-label">Ваш пол</label>
                        <select class="form-select" id="sex" required="">
                            <option value="1" selected="selected">Мужской</option>
                            <option value="0">Женский</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="age" class="form-label">Возраст</label>
                        <select class="form-select" id="age" required="">
                            <option value="1" selected="selected">до 25</option>
                            <option value="2">25 - 29</option>
                            <option value="3">30 - 34</option>
                            <option value="4">35 - 39</option>
                            <option value="5">40 - 44</option>
                            <option value="6">45 - 49</option>

                            <option value="7" forsex="w" style="display: none">50 и старше</option>
                            <option value="7" forsex="m">50 - 54</option>
                            <option value="8" forsex="m">55 - 59</option>
                            <option value="9" forsex="m">60 и старше</option>
                        </select>
                        <small class="text-muted" id="age-help">1-я возрастная группа</small>
                    </div>

                    <div class="col-6">
                        <label for="category" class="form-label">Категория </label>
                        <select class="form-select" id="category" required="">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        <a class="text-muted " data-toggle="modal" href="#" data-target="#staticBackdrop"> Какую
                            выбрать?</a>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
                             tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel"> Категории</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        категория N 1: военнослужащие, проходящие военную службу в основных подразделениях и
                                        подразделениях обеспечения воинских частей видов Вооруженных Сил, родов войск
                                        Вооруженных Сил и не
                                        входящих в них, кроме военнослужащих подразделений, указанных в категориях № 2 и 3
                                        <br/><br/>

                                        категория N 2: военнослужащие, проходящие военную службу в подразделениях:
                                        топогеодезических, метеорологических (гидрометеорологических),
                                        материально-технического обеспечения, медицинских, предупреждения о ракетном
                                        нападении и разведки космической обстановки, испытательных центров (полигонов),
                                        аэродромно-технического обеспечения, переменный состав учебных воинских
                                        частей;<br/><br/>

                                        категория N 3: военнослужащие, проходящие военную службу в органах военного
                                        управления, управлениях соединений, управлениях воинских частей, управлениях
                                        батальонов (им равных), научных организациях Вооруженных Сил (военных учебных
                                        центрах), военных представительствах, главных центрах (центрах, арсеналах, базах,
                                        отделах) видов обеспечения, центрах управления, лабораториях специального контроля,
                                        вузах на должностях постоянного и переменного состава (за исключением курсантов),
                                        учебных воинских частях на должностях постоянного состава, на пунктах отбора на
                                        военную службу по контракту, в военных комиссариатах, медицинских организациях
                                        Вооруженных Сил, военных оркестрах (ансамблях), фельдъегерской почтовой службе.
                                        <br/><br/>
                                        Военнослужащие подразделений, не входящих в категории № 1 и 2, от-носятся к
                                        категории № 3
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-6">
                        <label for="summ_upr" class="form-label">Упражнения </label>
                        <select class="form-select" id="summ_upr" disabled>
                            <option value="2">2</option>
                            <option value="3" selected="selected">3</option>
                            <option value="4">4</option>
                        </select>
                        <small class="text-muted">Количество упражнений (автоматически)</small>
                    </div>

                    <hr class="my-4">

                    <h3 class="mb-3"><span class="badge bg-success">2.</span> <span class="text-primary text-highlight-primary">Результаты</span> упражнений</h3>

                    <div class="col-8">
                        <label for="upr_select_1" class="form-label text-info ">Упражнение 1 </label>
                        <select class="form-select" id="upr_select_1" required="" numuprselect="1">
                            <optgroup label="Сила" type="sila">
                                <option value="1" type="sila">Упр. № 1 (Сгибание и разгибание рук в упоре лежа)</option>
                                <option value="2" type="sila">Упр. № 2 (Наклон туловища вперед)</option>
                                <option value="3" type="sila">Упр. № 3 (Подтягивание на перекладине)</option>
                                <option value="4" type="sila">Упр. № 4 (Поднимание ног к перекладине)</option>
                                <option value="5" type="sila">Упр. № 5 (Подъем переворотом на перекладине)</option>
                                <option value="6" type="sila">Упр. № 6 (Подъем силой на перекладине)</option>
                                <option value="7" type="sila">Упр. № 7 (Комбинированное силовое упражнение на перекладине)
                                </option>
                                <option value="8" type="sila">Упр. № 8 (Сгибание и разгибание рук в упоре на брусьях)
                                </option>
                                <option value="9" type="sila">Упр. № 9 (Угол в упоре на брусьях)</option>
                                <option value="10_1" type="sila" forsex="m">Упр. № 10 (Рывок гири) до 70 кг.</option>
                                <option value="10_2" type="sila" forsex="m">Упр. № 10 (Рывок гири) до 80 кг.</option>
                                <option value="10_3" type="sila" forsex="m">Упр. № 10 (Рывок гири) свыше 80 кг.</option>
                                <option value="10_1" type="sila" forsex="w">Упр. № 10 (Рывок гири) до 60 кг.</option>
                                <option value="10_2" type="sila" forsex="w">Упр. № 10 (Рывок гири) до 70 кг.</option>
                                <option value="10_3" type="sila" forsex="w">Упр. № 10 (Рывок гири) свыше 70 кг.</option>

                                <option value="11_1" type="sila" forsex="m">Упр. № 11 (Толчок двух гирь) до 70 кг.</option>
                                <option value="11_2" type="sila" forsex="m">Упр. № 11 (Толчок двух гирь) до 80 кг.</option>
                                <option value="11_3" type="sila" forsex="m">Упр. № 11 (Толчок двух гирь) свыше 80 кг.
                                </option>
                                <option value="11_1" type="sila" forsex="w">Упр. № 11 (Толчок двух гирь) до 60 кг.</option>
                                <option value="11_2" type="sila" forsex="w">Упр. № 11 (Толчок двух гирь) до 70 кг.</option>
                                <option value="11_3" type="sila" forsex="w">Упр. № 11 (Толчок двух гирь) свыше 70 кг.
                                </option>

                                <option value="12_1" type="sila" forsex="m">Упр. № 12 (Толчок двух гирь по длинному циклу)
                                    до 70
                                    кг.
                                </option>
                                <option value="12_2" type="sila" forsex="m">Упр. № 12 (Толчок двух гирь по длинному циклу)
                                    до 80
                                    кг.
                                </option>
                                <option value="12_3" type="sila" forsex="m">Упр. № 12 (Толчок двух гирь по длинному циклу)
                                    свыше
                                    80 кг.
                                </option>
                                <option value="12_1" type="sila" forsex="w">Упр. № 12 (Толчок двух гирь по длинному циклу)
                                    до 60
                                    кг.
                                </option>
                                <option value="12_2" type="sila" forsex="w">Упр. № 12 (Толчок двух гирь по длинному циклу)
                                    до 70
                                    кг.
                                </option>
                                <option value="12_3" type="sila" forsex="w">Упр. № 12 (Толчок двух гирь по длинному циклу)
                                    свыше
                                    70 кг.
                                </option>

                                <option value="13" type="sila">Упр. № 13 (Комплексное упражнение)</option>

                                <option value="14_1" type="sila" forsex="m">Упр. № 14 (Жим штанги лежа) до 70 кг.</option>
                                <option value="14_2" type="sila" forsex="m">Упр. № 14 (Жим штанги лежа) до 80 кг.</option>
                                <option value="14_3" type="sila" forsex="m">Упр. № 14 (Жим штанги лежа) свыше 80 кг.
                                </option>
                                <option value="14_1" type="sila" forsex="w">Упр. № 14 (Жим штанги лежа) до 60 кг.</option>
                                <option value="14_2" type="sila" forsex="w">Упр. № 14 (Жим штанги лежа) до 70 кг.</option>
                                <option value="14_3" type="sila" forsex="w">Упр. № 14 (Жим штанги лежа) свыше 70 кг.
                                </option>

                                <option value="15_1" type="sila" forsex="m">Упр. № 15 (Становая тяга со штангой) до 70 кг.
                                </option>
                                <option value="15_2" type="sila" forsex="m">Упр. № 15 (Становая тяга со штангой) до 80 кг.
                                </option>
                                <option value="15_3" type="sila" forsex="m">Упр. № 15 (Становая тяга со штангой) свыше 80
                                    кг.
                                </option>
                                <option value="15_1" type="sila" forsex="w">Упр. № 15 (Становая тяга со штангой) до 60 кг.
                                </option>
                                <option value="15_2" type="sila" forsex="w">Упр. № 15 (Становая тяга со штангой) до 70 кг.
                                </option>
                                <option value="15_3" type="sila" forsex="w">Упр. № 15 (Становая тяга со штангой) свыше 70
                                    кг.
                                </option>

                                <option value="16_1" type="sila" forsex="m">Упр. № 16 (Приседание со штангой) до 70 кг.
                                </option>
                                <option value="16_2" type="sila" forsex="m">Упр. № 16 (Приседание со штангой) до 80 кг.
                                </option>
                                <option value="16_3" type="sila" forsex="m">Упр. № 16 (Приседание со штангой) свыше 80 кг.
                                </option>
                                <option value="16_1" type="sila" forsex="w">Упр. № 16 (Приседание со штангой) до 60 кг.
                                </option>
                                <option value="16_2" type="sila" forsex="w">Упр. № 16 (Приседание со штангой) до 70 кг.
                                </option>
                                <option value="16_3" type="sila" forsex="w">Упр. № 16 (Приседание со штангой) свыше 70 кг.
                                </option>
                            </optgroup>
                            <optgroup label="Быстрота" type="bistro">
                                <option value="17" type="bistro">Упр. № 17 (Бег на 60 м)</option>
                                <option value="18" type="bistro">Упр. № 18 (Бег на 100 м)</option>
                                <option value="19" type="bistro">Упр. № 19 (Челночный бег 10×10 м)</option>
                                <option value="20" type="bistro">Упр. № 20 (Плавание на 50 м вольным стилем)</option>
                                <option value="21" type="bistro">Упр. № 21 (Плавание на 100 м вольным стилем)</option>
                                <option value="22" type="bistro">Упр. № 22 (Плавание на 100 м способом брасс)</option>
                            </optgroup>

                            <optgroup label="Ловкость" type="lovkost">
                                <option value="30" type="lovkost">Упр. № 30 (Комплексное упражнение на ловкость)</option>
                                <option value="31" type="lovkost">Упр. № 31 (Прыжки со скакалкой)</option>
                                <option value="32" type="lovkost">Упр. № 32 (Передвижение по узкой опоре (бревну))</option>
                            </optgroup>


                        </select>
                        <small class="text-muted" id="upr_help_1"></small>
                    </div>

                    <div class="col-4">
                        <label for="upr_rezu_1" class="form-label text-info">Результат</label>
                        <input type="number" class="form-control" id="upr_rezu_1" placeholder="" numupr="1">
                        <small class="text-muted" id="upr_ball_1"></small>
                    </div>


                    <div class="col-8">
                        <label for="upr_select_2" class="form-label text-info">Упражнение 2</label>
                        <select class="form-select" id="upr_select_2" required="" numuprselect="2">
                            <optgroup label="Сила" type="sila">
                                <option value="1" type="sila">Упр. № 1 (Сгибание и разгибание рук в упоре лежа)</option>
                                <option value="2" type="sila">Упр. № 2 (Наклон туловища вперед)</option>
                                <option value="3" type="sila">Упр. № 3 (Подтягивание на перекладине)</option>
                                <option value="4" type="sila">Упр. № 4 (Поднимание ног к перекладине)</option>
                                <option value="5" type="sila">Упр. № 5 (Подъем переворотом на перекладине)</option>
                                <option value="6" type="sila">Упр. № 6 (Подъем силой на перекладине)</option>
                                <option value="7" type="sila">Упр. № 7 (Комбинированное силовое упражнение на перекладине)
                                </option>
                                <option value="8" type="sila">Упр. № 8 (Сгибание и разгибание рук в упоре на брусьях)
                                </option>
                                <option value="9" type="sila">Упр. № 9 (Угол в упоре на брусьях)</option>
                                <option value="10_1" type="sila" forsex="m">Упр. № 10 (Рывок гири) до 70 кг.</option>
                                <option value="10_2" type="sila" forsex="m">Упр. № 10 (Рывок гири) до 80 кг.</option>
                                <option value="10_3" type="sila" forsex="m">Упр. № 10 (Рывок гири) свыше 80 кг.</option>
                                <option value="10_1" type="sila" forsex="w">Упр. № 10 (Рывок гири) до 60 кг.</option>
                                <option value="10_2" type="sila" forsex="w">Упр. № 10 (Рывок гири) до 70 кг.</option>
                                <option value="10_3" type="sila" forsex="w">Упр. № 10 (Рывок гири) свыше 70 кг.</option>

                                <option value="11_1" type="sila" forsex="m">Упр. № 11 (Толчок двух гирь) до 70 кг.</option>
                                <option value="11_2" type="sila" forsex="m">Упр. № 11 (Толчок двух гирь) до 80 кг.</option>
                                <option value="11_3" type="sila" forsex="m">Упр. № 11 (Толчок двух гирь) свыше 80 кг.
                                </option>
                                <option value="11_1" type="sila" forsex="w">Упр. № 11 (Толчок двух гирь) до 60 кг.</option>
                                <option value="11_2" type="sila" forsex="w">Упр. № 11 (Толчок двух гирь) до 70 кг.</option>
                                <option value="11_3" type="sila" forsex="w">Упр. № 11 (Толчок двух гирь) свыше 70 кг.
                                </option>

                                <option value="12_1" type="sila" forsex="m">Упр. № 12 (Толчок двух гирь по длинному циклу)
                                    до 70
                                    кг.
                                </option>
                                <option value="12_2" type="sila" forsex="m">Упр. № 12 (Толчок двух гирь по длинному циклу)
                                    до 80
                                    кг.
                                </option>
                                <option value="12_3" type="sila" forsex="m">Упр. № 12 (Толчок двух гирь по длинному циклу)
                                    свыше
                                    80 кг.
                                </option>
                                <option value="12_1" type="sila" forsex="w">Упр. № 12 (Толчок двух гирь по длинному циклу)
                                    до 60
                                    кг.
                                </option>
                                <option value="12_2" type="sila" forsex="w">Упр. № 12 (Толчок двух гирь по длинному циклу)
                                    до 70
                                    кг.
                                </option>
                                <option value="12_3" type="sila" forsex="w">Упр. № 12 (Толчок двух гирь по длинному циклу)
                                    свыше
                                    70 кг.
                                </option>

                                <option value="13" type="sila">Упр. № 13 (Комплексное упражнение)</option>

                                <option value="14_1" type="sila" forsex="m">Упр. № 14 (Жим штанги лежа) до 70 кг.</option>
                                <option value="14_2" type="sila" forsex="m">Упр. № 14 (Жим штанги лежа) до 80 кг.</option>
                                <option value="14_3" type="sila" forsex="m">Упр. № 14 (Жим штанги лежа) свыше 80 кг.
                                </option>
                                <option value="14_1" type="sila" forsex="w">Упр. № 14 (Жим штанги лежа) до 60 кг.</option>
                                <option value="14_2" type="sila" forsex="w">Упр. № 14 (Жим штанги лежа) до 70 кг.</option>
                                <option value="14_3" type="sila" forsex="w">Упр. № 14 (Жим штанги лежа) свыше 70 кг.
                                </option>

                                <option value="15_1" type="sila" forsex="m">Упр. № 15 (Становая тяга со штангой) до 70 кг.
                                </option>
                                <option value="15_2" type="sila" forsex="m">Упр. № 15 (Становая тяга со штангой) до 80 кг.
                                </option>
                                <option value="15_3" type="sila" forsex="m">Упр. № 15 (Становая тяга со штангой) свыше 80
                                    кг.
                                </option>
                                <option value="15_1" type="sila" forsex="w">Упр. № 15 (Становая тяга со штангой) до 60 кг.
                                </option>
                                <option value="15_2" type="sila" forsex="w">Упр. № 15 (Становая тяга со штангой) до 70 кг.
                                </option>
                                <option value="15_3" type="sila" forsex="w">Упр. № 15 (Становая тяга со штангой) свыше 70
                                    кг.
                                </option>

                                <option value="16_1" type="sila" forsex="m">Упр. № 16 (Приседание со штангой) до 70 кг.
                                </option>
                                <option value="16_2" type="sila" forsex="m">Упр. № 16 (Приседание со штангой) до 80 кг.
                                </option>
                                <option value="16_3" type="sila" forsex="m">Упр. № 16 (Приседание со штангой) свыше 80 кг.
                                </option>
                                <option value="16_1" type="sila" forsex="w">Упр. № 16 (Приседание со штангой) до 60 кг.
                                </option>
                                <option value="16_2" type="sila" forsex="w">Упр. № 16 (Приседание со штангой) до 70 кг.
                                </option>
                                <option value="16_3" type="sila" forsex="w">Упр. № 16 (Приседание со штангой) свыше 70 кг.
                                </option>
                            </optgroup>
                            <optgroup label="Выносливость" type="vinos">
                                <option value="23" type="vinos">Упр. № 23 (Бег на 400 м)</option>
                                <option value="24" type="vinos">Упр. № 24 (Бег на 1 км)</option>
                                <option value="25" type="vinos">Упр. № 25 (Бег на 3 км)</option>
                                <option value="26" type="vinos">Упр. № 26 (Бег на 5 км)</option>
                                <option value="27" type="vinos">Упр. № 27 (Лыжная гонка на 5 км)</option>
                                <option value="28" type="vinos">Упр. № 28 (Плавание на 500 м вольным стилем)</option>
                                <option value="29" type="vinos">Упр. № 29 (Восхождение на платформу (тумбу)</option>
                            </optgroup>
                        </select>
                        <small class="text-muted" id="upr_help_2"></small>
                    </div>

                    <div class="col-4">
                        <label for="upr_rezu_2" class="form-label text-info">Результат</label>
                        <input type="number" class="form-control" id="upr_rezu_2" numupr="2">
                        <small class="text-muted" id="upr_ball_2"></small>
                    </div>


                    <div class="col-8" id="upr_3_div1">
                        <label for="upr_select_3" class="form-label text-info">Упражнение 3</label>
                        <select class="form-select" id="upr_select_3" required="" numuprselect="3">
                            <optgroup label="Выносливость" type="vinos">
                                <option value="23" type="vinos">Упр. № 23 (Бег на 400 м)</option>
                                <option value="24" type="vinos">Упр. № 24 (Бег на 1 км)</option>
                                <option value="25" type="vinos">Упр. № 25 (Бег на 3 км)</option>
                                <option value="26" type="vinos">Упр. № 26 (Бег на 5 км)</option>
                                <option value="27" type="vinos">Упр. № 27 (Лыжная гонка на 5 км)</option>
                                <option value="28" type="vinos">Упр. № 28 (Плавание на 500 м вольным стилем)</option>
                                <option value="29" type="vinos">Упр. № 29 (Восхождение на платформу (тумбу)</option>
                            </optgroup>
                            <optgroup label="СФУ" type="sfu">
                                <option value="39" type="sfu">Упр. № 39 (Бег на 60 м с грузом)</option>
                                <option value="40" type="sfu">Упр. № 40 (Бег на 60 м в экипировке с автоматом)</option>
                                <option value="41" type="sfu">Упр. № 41 (Челночный бег 4×100 м с оружием)</option>
                                <option value="42" type="sfu">Упр. № 42 (Бег на 800 м с оружием)</option>
                                <option value="43" type="sfu">Упр. № 43 (Марш-бросок на 5 км)</option>
                                <option value="44" type="sfu">Упр. № 44 (Марш-бросок на лыжах на 5 км)</option>


                                <option value="45" type="sfu">Упр. № 45 (Общее контрольное упражнение на единой полосе
                                    препятствий)
                                </option>
                                <option value="46" type="sfu">Упр. № 46 (Специальное контрольное упражнение для курсантов
                                    военно-учебных заведений, готовящих специалистов для подразделений и воинских частей
                                    Сухопутных войск (кроме танковых, зенитных ракетных, инженерных и самоходных
                                    артиллерийских
                                    воинских частей, танковых подразделений мотострелковых воинских частей), морской пехоты)
                                </option>
                                <option value="47" type="sfu">Упр. № 47 (Специальное контрольное упражнение для курсантов
                                    военно-учебных заведений, готовящих специалистов для танковых, зенитных ракетных,
                                    ракетных,
                                    инженерных и самоходных артиллерийских воинских частей, танковых подразделений
                                    мотострелковых воинских частей)
                                </option>
                                <option value="48" type="sfu">Упр. № 48 (Специальное контрольное упражнение для
                                    военнослужащих
                                    Воздушно-десантных войск)
                                </option>
                                <option value="49" type="sfu">Упр. № 49 (Специальное контрольное упражнение для
                                    военнослужащих
                                    наводных кораблей и подводных лодок, курсантов военно-учебных заведений (учебных
                                    воинских
                                    частей), готовящих специалистов для надводных кораблей и подводных лодок)
                                </option>
                                <option value="50" type="sfu">Упр. № 50 (Специальное контрольное упражнение для
                                    военнослужащих
                                    горных подразделений )
                                </option>
                                <option value="51" type="sfu">Упр. № 51 (Общее контрольное упражнение на специальной полосе
                                    препятствий для военнослужащих)
                                </option>
                                <option value="52" type="sfu">Упр. № 52 (Общее контрольное упражнение на специальной морской
                                    полосе препятствий для военнослужащих)
                                </option>

                                <option value="53" type="sfu">Упр. № 53 ( Комплекс приемов и действий рукопашного боя)
                                    (5,4,3,2)
                                </option>

                                <option value="54" type="sfu">Упр. № 54 ( Метание ножа на точность с места) (3,2,1)
                                </option>
                                <option value="55" type="sfu">Упр. № 55 (Метание малой пехотной лопаты на точность
                                    с места) (3,2,1)
                                </option>


                                <option value="56" type="sfu">Упр. № 56 (Плавание в обмундировании с оружием на 50 м)
                                </option>
                                <option value="57" type="sfu">Упр. № 57 (Плавание в обмундировании с оружием на 100 м)
                                </option>
                                <option value="58" type="sfu">Упр. № 58 (Ныряние в длину в форме)</option>


                                <option value="59" type="sfu">Упр. № 59 (Бег на 3 км со стрельбой и метанием гранат )
                                </option>
                                <option value="60" type="sfu">Упр. № 60 (Бег с преодолением полосы препятствий)</option>
                                <option value="61" type="sfu">Упр. № 61 (Комплексное упражнение «Квадрат» )</option>
                                <option value="62" type="sfu">Упр. № 62 (Упражнение на стационарном гимнастическом
                                    колесе)
                                </option>
                                <option value="63" type="sfu">Упр. № 63 (Упражнение на подвижном гимнастическом
                                    колесе)
                                </option>
                                <option value="64" type="sfu">Упр. № 64 (Упражнение на лопинге )</option>
                                <option value="65" type="sfu">Упр. № 65 (Упражнение на батуте )</option>
                                <option value="66" type="sfu">Упр. № 66 (Поднимание ящика для боеприпасов)</option>
                                <option value="67" type="sfu">Упр. № 67 (Упор лежа на предплечьях)</option>
                                <option value="68" type="sfu">Упр. № 68 (Метание гранаты на дальность с места)</option>
                                <option value="69" type="sfu">Упр. № 69 (Метание гранат на точность)</option>
                                <option value="70" type="sfu">Упр. № 70 (Вис на перекладине)</option>
                            </optgroup>
                        </select>
                        <small class="text-muted" id="upr_help_3"></small>
                    </div>

                    <div class="col-4" id="upr_3_div2">
                        <label for="upr_rezu_3" class="form-label text-info">Результат</label>
                        <input type="number" class="form-control" id="upr_rezu_3" numupr="3">
                        <small class="text-muted" id="upr_ball_3"></small>
                    </div>

                    <div class="col-8" id="upr_4_div1" style="display: none">
                        <label for="upr_select_4" class="form-label text-info">Упражнение 4</label>
                        <select class="form-select" id="upr_select_4" required="" numuprselect="4">
                            <optgroup label="СФУ" type="sfu">
                                <option value="39" type="sfu">Упр. № 39 (Бег на 60 м с грузом)</option>
                                <option value="40" type="sfu">Упр. № 40 (Бег на 60 м в экипировке с автоматом)</option>
                                <option value="41" type="sfu">Упр. № 41 (Челночный бег 4×100 м с оружием)</option>
                                <option value="42" type="sfu">Упр. № 42 (Бег на 800 м с оружием)</option>
                                <option value="43" type="sfu">Упр. № 43 (Марш-бросок на 5 км)</option>
                                <option value="44" type="sfu">Упр. № 44 (Марш-бросок на лыжах на 5 км)</option>


                                <option value="45" type="sfu">Упр. № 45 (Общее контрольное упражнение на единой полосе
                                    препятствий)
                                </option>
                                <option value="46" type="sfu">Упр. № 46 (Специальное контрольное упражнение для курсантов
                                    военно-учебных заведений, готовящих специалистов для подразделений и воинских частей
                                    Сухопутных войск (кроме танковых, зенитных ракетных, инженерных и самоходных
                                    артиллерийских
                                    воинских частей, танковых подразделений мотострелковых воинских частей), морской пехоты)
                                </option>
                                <option value="47" type="sfu">Упр. № 47 (Специальное контрольное упражнение для курсантов
                                    военно-учебных заведений, готовящих специалистов для танковых, зенитных ракетных,
                                    ракетных,
                                    инженерных и самоходных артиллерийских воинских частей, танковых подразделений
                                    мотострелковых воинских частей)
                                </option>
                                <option value="48" type="sfu">Упр. № 48 (Специальное контрольное упражнение для
                                    военнослужащих
                                    Воздушно-десантных войск)
                                </option>
                                <option value="49" type="sfu">Упр. № 49 (Специальное контрольное упражнение для
                                    военнослужащих
                                    наводных кораблей и подводных лодок, курсантов военно-учебных заведений (учебных
                                    воинских
                                    частей), готовящих специалистов для надводных кораблей и подводных лодок)
                                </option>
                                <option value="50" type="sfu">Упр. № 50 (Специальное контрольное упражнение для
                                    военнослужащих
                                    горных подразделений )
                                </option>
                                <option value="51" type="sfu">Упр. № 51 (Общее контрольное упражнение на специальной полосе
                                    препятствий для военнослужащих)
                                </option>
                                <option value="52" type="sfu">Упр. № 52 (Общее контрольное упражнение на специальной морской
                                    полосе препятствий для военнослужащих)
                                </option>

                                <option value="53" type="sfu">Упр. № 53 ( Комплекс приемов и действий рукопашного боя)
                                    (5,4,3,2)
                                </option>

                                <option value="54" type="sfu">Упр. № 54 ( Метание ножа на точность с места) (3,2,1)
                                </option>
                                <option value="55" type="sfu">Упр. № 55 (Метание малой пехотной лопаты на точность
                                    с места) (3,2,1)
                                </option>


                                <option value="56" type="sfu">Упр. № 56 (Плавание в обмундировании с оружием на 50 м)
                                </option>
                                <option value="57" type="sfu">Упр. № 57 (Плавание в обмундировании с оружием на 100 м)
                                </option>
                                <option value="58" type="sfu">Упр. № 58 (Ныряние в длину в форме)</option>


                                <option value="59" type="sfu">Упр. № 59 (Бег на 3 км со стрельбой и метанием гранат )
                                </option>
                                <option value="60" type="sfu">Упр. № 60 (Бег с преодолением полосы препятствий)</option>
                                <option value="61" type="sfu">Упр. № 61 (Комплексное упражнение «Квадрат» )</option>
                                <option value="62" type="sfu">Упр. № 62 (Упражнение на стационарном гимнастическом
                                    колесе)
                                </option>
                                <option value="63" type="sfu">Упр. № 63 (Упражнение на подвижном гимнастическом
                                    колесе)
                                </option>
                                <option value="64" type="sfu">Упр. № 64 (Упражнение на лопинге )</option>
                                <option value="65" type="sfu">Упр. № 65 (Упражнение на батуте )</option>
                                <option value="66" type="sfu">Упр. № 66 (Поднимание ящика для боеприпасов)</option>
                                <option value="67" type="sfu">Упр. № 67 (Упор лежа на предплечьях)</option>
                                <option value="68" type="sfu">Упр. № 68 (Метание гранаты на дальность с места)</option>
                                <option value="69" type="sfu">Упр. № 69 (Метание гранат на точность)</option>
                                <option value="70" type="sfu">Упр. № 70 (Вис на перекладине)</option>
                            </optgroup>
                        </select>

                        <small class="text-muted" id="upr_help_4"></small>
                    </div>

                    <div class="col-4" id="upr_4_div2" style="display: none">
                        <label for="upr_rezu_4" class="form-label text-info">Результат</label>
                        <input type="number" class="form-control" id="upr_rezu_4" numupr="4">
                        <small class="text-muted" id="upr_ball_4"></small>
                    </div>


                    <div class="col-8" id="upr_5_div1" style="display: none">
                        <label for="upr_select_5" class="form-label text-info">Ловкость</label>
                        <select class="form-select" id="upr_select_5" required="" numuprselect="5">
                            <option value="00">Оценка за упражнение на ловкость (5,4,3,2)</option>
                            <!--                        <option value="51" forsex="m">Упр. № 51 (Тройной прыжок с места)</option>-->
                        </select>
                        <small class="text-muted" id="upr_help_5"></small>
                    </div>

                    <div class="col-4" id="upr_5_div2" style="display: none">
                        <label for="upr_rezu_5" class="form-label text-info">Результат</label>
                        <input type="number" class="form-control" id="upr_rezu_5" numupr="5">
                        <small class="text-muted" id="upr_ball_5"></small>
                    </div>
                </div>


            </div>
            <div class="col-md-5 col-lg-4 order-md-last">
                <h3 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Рекомендации</span>
                </h3>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div id="recomend_color_1">
                            <h6 class="my-0">Упражнение 1</h6>
                            <small class="text-muted" id="recomend_text_1"></small>
                        </div>
                        <span class="text-muted" id="recomend_ball_1">0</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div id="recomend_color_2">
                            <h6 class="my-0">Упражнение 2</h6>
                            <small class="text-muted" id="recomend_text_2"></small>
                        </div>
                        <span class="text-muted" id="recomend_ball_2">0</span>
                    </li>
                    <li class="list-group-item " id="recomend_block_3">
                        <div class="d-flex justify-content-between lh-sm ">
                            <div id="recomend_color_3">
                                <h6 class="my-0">Упражнение 3</h6>
                                <small class="text-muted" id="recomend_text_3"></small>
                            </div>
                            <span class="text-muted" id="recomend_ball_3">0</span>
                        </div>
                    </li>

                    <li class="list-group-item " style="display: none" id="recomend_block_4">
                        <div class="d-flex justify-content-between lh-sm ">
                            <div id="recomend_color_4">
                                <h6 class="my-0">Упражнение 4</h6>
                                <small class="text-muted" id="recomend_text_4"></small>
                            </div>
                            <span class="text-muted" id="recomend_ball_4">0</span>
                        </div>
                    </li>
                    <li class="list-group-item  " style="display: none" id="recomend_block_5">
                        <div class="d-flex justify-content-between lh-sm ">
                            <div id="recomend_color_5">
                                <h6 class="my-0">Упражнение 5</h6>
                                <small class="text-muted" id="recomend_text_5"></small>
                            </div>
                            <span class="text-muted" id="recomend_ball_5">0</span>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Итого </span>
                        <strong id="upr_itog_recomend_ball">0 </strong>
                    </li>


                </ul>


                <div class="col">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h3 class="my-0 font-weight-normal"> <span class="badge bg-success">3. </span> <span class="text-primary text-highlight-primary">Итоговый</span> результат</h3>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title text-center text-success" id="score"></h1>
                            <p class="fs-6 text-center text-muted" id="score_prefix"></p>
                            <p class="h3 text-center text-uppercase text-success" id="score_level"></p>


                            <div class="text-center " id="block_send_email" style="display: none">
                                <p class="small" style="line-height: 90%;margin-bottom: 10px;font-size: 13px;"></p>
                                <input class="form-control form-control-sm" id="send_email" type="email"
                                       placeholder="отправить отчет на e-mail" data-bs-toggle="tooltip"
                                       data-bs-placement="top"
                                       title="Можете отправить отчет по всем упражнениям себе на почту чтобы не забыть результаты сдачи">

                                <button type="button" class="btn btn-outline-primary  btn-sm align-content-center mt-2"
                                        id="button_send_email">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                                      style="display: none" id="spinner_send_email"></span>
                                    Отправить
                                </button>
                                <p class="text-muted" style="font-size: 13px">
                                    Также будет создан аккаунт на <a href="https://oficeru.ru/" class="text-reset">офицеру.ру</a>.
                                    Для подтверждения e-mail Вам будет отправлено письмо на указанный адрес.
                                </p>
                            </div>


                            <ul class="list-unstyled mt-3 mb-4">
                                <li></li>
                                <li></li>
                            </ul>

                            <div id="score_table"></div>

                            <br>
                            <div style="text-align: center">
                                <script src="https://yastatic.net/share2/share.js"></script>
                                <div class="ya-share2" data-curtain
                                     data-services="vkontakte,odnoklassniki,telegram,viber,whatsapp"></div>
                            </div>



                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h3 class="my-0 font-weight-normal"> <span class="badge bg-success">4. </span> <span class="text-primary text-highlight-primary">На развитие</span> проекта </h3>
                        </div>
                        <div class="card-body">

                            <figure class="text-center">
                                <blockquote class="blockquote">
                                    <p>2202 2011 4769 2632</p>
                                </blockquote>
                                <figcaption class="blockquote-footer">
                                    карта Сбера <cite title="Source Title">на развитие проекта</cite>
                                </figcaption>
                            </figure>



                        </div>
                    </div>
                </div>

            </div>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1"><a href="https://oficeru.ru/doc/834/" class="text-muted">
                    Приказ Министра обороны РФ от 20 апреля 2023 г. № 230 <br>

                    «Об утверждении наставления по физической подготовке в Вооруженных Силах Российской Федерации»</a></p>

            <ul class="list-inline">
                <li class="list-inline-item">
                    <a class="text-muted " data-toggle="modal" href="#" data-target="#confid"> Что нового</a>
                </li>
                <li class="list-inline-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-telegram" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"/>
                    </svg>
                    <a class="text-muted " href="https://t.me/oficeru/5">Нашли ошибку?</a>
                </li>

                <!-- Modal -->
                <div class="modal fade" id="confid" data-backdrop="static" data-keyboard="false"
                     tabindex="-1" aria-labelledby="staticBackdropLabel2" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel2"> Новое</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-left">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть
                                </button>

                            </div>
                        </div>
                    </div>
                </div>

            </ul>
        </footer>
    </div>




@endsection

@section('vendor-scripts')
    @parent
@endsection

@section('page-scripts')
    @parent
@endsection

