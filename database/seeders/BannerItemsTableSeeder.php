<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BannerItemsTableSeeder extends Seeder
{
    public function run()
    {
        $items = [
            [
                'banner_id' => 1,
                'title' => 'Проводим обучающие курсы',
                'img' => 'images/slide-doctors.png',
                'description' => '<p>1 Здоровье – одна из главных, вечных ценностей. Красота – незаменимый атрибут успешности и здоровья.</p>
			 							<blockquote>Estelife Clinic – медицинский центр в Краснодаре, который поможет вам восстановить свое здоровье, а также сохранить и продлить вашу красоту и молодость.</blockquote>
			 							<p>Наша клиника оснащена новейшим медицинским оборудованием, позволяющим выполнять диагностику заболеваний максимально информативно и точно. В своей работе мы используем расходные материалы и косметические продукты самого высокого качества, ведь ваше здоровье и доверие – главное для нас.</p>',
                'extra' => null,
                'code_banner' => 'about_company_top',
                'full_description' => null
            ],
            [
                'banner_id' => 1,
                'title' => 'Проводим обучающие курсы',
                'img' => 'images/slide-doctors.png',
                'description' => '<p>2 Здоровье – одна из главных, вечных ценностей. Красота – незаменимый атрибут успешности и здоровья.</p>
			 							<blockquote>Estelife Clinic – медицинский центр в Краснодаре, который поможет вам восстановить свое здоровье, а также сохранить и продлить вашу красоту и молодость.</blockquote>
			 							<p>Наша клиника оснащена новейшим медицинским оборудованием, позволяющим выполнять диагностику заболеваний максимально информативно и точно. В своей работе мы используем расходные материалы и косметические продукты самого высокого качества, ведь ваше здоровье и доверие – главное для нас.</p>',
                'extra' => null,
                'code_banner' => 'about_company_top',
                'full_description' => null
            ],
            [
                'banner_id' => 1,
                'title' => 'Проводим обучающие курсы',
                'img' => 'images/slide-doctors.png',
                'description' => '<p>3 Здоровье – одна из главных, вечных ценностей. Красота – незаменимый атрибут успешности и здоровья.</p>
			 							<blockquote>Estelife Clinic – медицинский центр в Краснодаре, который поможет вам восстановить свое здоровье, а также сохранить и продлить вашу красоту и молодость.</blockquote>
			 							<p>Наша клиника оснащена новейшим медицинским оборудованием, позволяющим выполнять диагностику заболеваний максимально информативно и точно. В своей работе мы используем расходные материалы и косметические продукты самого высокого качества, ведь ваше здоровье и доверие – главное для нас.</p>',
                'extra' => null,
                'code_banner' => 'about_company_top',
                'full_description' => null
            ],
            [
                'banner_id' => 4,
                'title' => null,
                'img' => 'images/slide-doctors.png',
                'description' => null,
                'extra' => null,
                'code_banner' => 'home_top',
                'full_description' => null
            ],
            [
                'banner_id' => 4,
                'title' => null,
                'img' => 'images/slide-doctors.png',
                'description' => null,
                'extra' => null,
                'code_banner' => 'home_top',
                'full_description' => null
            ],
            [
                'banner_id' => 4,
                'title' => null,
                'img' => 'images/slide-doctors.png',
                'description' => null,
                'extra' => null,
                'code_banner' => 'home_top',
                'full_description' => null
            ],
            /*[
                'banner_id' => 5,
                'title' => 'Консультация специалиста',
                'img' => null,
                'description' => '<h3>В 100% случаев</h3> <p><strong>Необходима предварительная консультация специалиста для правильного назначения лечения/процедуры.</strong></p> <p><strong>Самодиагностика зачастую приводит к неожиданным результатам.</strong></p> <a class="btn btn-indigo popup-with-form" href="#order">Записаться на прием</a>',
                'extra' => '<i class="demo-icon icon-doctor"></i>',
                'code_banner' => '',
                'full_description' => null
            ],
            [
                'banner_id' => 5,
                'title' => 'Диагностика',
                'img' => null,
                'description' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Corrupti deserunt suscipit, in adipisci, reiciendis voluptates veniam totam odio sunt quasi distinctio qui at nostrum fugiat repellendus! Dignissimos voluptatum earum aliquid.</p>',
                'extra' => '<i class="demo-icon icon-diag"></i>',
                'code_banner' => '',
                'full_description' => null
            ],
            [
                'banner_id' => 5,
                'title' => 'Лазерная косметология',
                'img' => null,
                'description' => '<p><strong>Лазерная косметология - новейшее направление в современной косметологии. Ее основная задача &mdash; решить дерматологические и косметологические задачи.</strong></p> <div class="ul-wrap"> <ul> <li> <h4>MEDIOSTAR NEXT PRO</h4> </li> <li>Лазерная эпиляция</li> <li>Лазерное лечение акне</li> <li>Лазерное омоложение</li> <li>Лазерное удаление сосудов</li> <li>Лазерное лечение грибка ногтей</li> </ul> <ul> <li> <h4>LUTRONIC ACTION II</h4> </li> <li>Лазерное омоложение</li> <li>Лазерный пилинг Shining Peel</li> <li>Процедура &laquo;Петит Леди&raquo;</li> </ul> <ul> <li> <h4>ЛАЗМИК</h4> </li> <li>Лазерная биоревитализация</li> <li>Лазерный липолиз</li> <li>ВЛОК</li> </ul> </div> <a class="btn btn-indigo popup-with-form" href="#order">Записаться на прием</a>',
                'extra' => '<i class="demo-icon icon-laser"></i>',
                'code_banner' => '',
                'full_description' => null
            ],
            [
                'banner_id' => 5,
                'title' => 'Аппаратная косметология',
                'img' => null,
                'description' => '<p><strong>Аппаратная косметология - это ряд омолаживающих и лечебных процедур, которые выполняют опытные дерматокосметологи, используя различную современную аппаратуру.</strong></p> <ul> <li>Вакуумный массаж</li> <li>Карбокситерапия</li> <li>Газожидкостный пилинг</li> <li>RF-Лифтинг</li> <li>SMAS-Лифтинг</li> </ul> <a class="btn btn-indigo popup-with-form" href="#order">Записаться на прием</a>',
                'extra' => '<i class="demo-icon icon-girl"></i>',
                'code_banner' => '',
                'full_description' => null
            ],
            [
                'banner_id' => 5,
                'title' => 'Инъекционная косметология',
                'img' => null,
                'description' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Corrupti deserunt suscipit, in adipisci, reiciendis voluptates veniam totam odio sunt quasi distinctio qui at nostrum fugiat repellendus! Dignissimos voluptatum earum aliquid.</p>',
                'extra' => '<i class="demo-icon icon-girl2"></i>',
                'code_banner' => '',
                'full_description' => null
            ],
            [
                'banner_id' => 5,
                'title' => 'Эстетическая косметология',
                'img' => null,
                'description' => '<p><strong>Сегодня в косметологии популярны многие процедуры для кожи лица и тела. Услугами пользуются как женщины, так и мужчины. Ведь благодаря современному подходу можно намного дольше сохранить свою красоту и молодость.</strong></p> <div class="ul-wrap"> <ul> <li> <h4>ИНВАЗИВНАЯ КОСМЕТОЛОГИЯ</h4> </li> <li>Мезотерапия</li> <li>Биоревитализация</li> <li>Контурная пластики лица</li> <li>Ботулинотерапия</li> <li>PRP-терапия</li> <li>Интимная контурная пластика</li> </ul> <ul> <li> <h4>ЭСТЕТИКА ЛИЦА</h4> </li> <li>Пилинг</li> <li>Уходы по лицу</li> <li>Интралипотерапия</li> <li>Чистка лица</li> <li>Массаж лица</li> </ul> </div> <a class="btn btn-indigo popup-with-form" href="#order">Записаться на прием</a>',
                'extra' => '<i class="demo-icon icon-girl3"></i>',
                'code_banner' => '',
                'full_description' => null
            ],
            [
                'banner_id' => 5,
                'title' => 'Удаление новообразований',
                'img' => null,
                'description' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Corrupti deserunt suscipit, in adipisci, reiciendis voluptates veniam totam odio sunt quasi distinctio qui at nostrum fugiat repellendus! Dignissimos voluptatum earum aliquid.</p>',
                'extra' => '<i class="demo-icon icon-knife"></i>',
                'code_banner' => '',
                'full_description' => null
            ],*/
            [
                'banner_id' => 0,
                'title' => null,
                'img' => null,
                'description' => null,
                'extra' => null,
                'code_banner' => 'general_home_about_us',
                'full_description' => '<h3>Медицинский центр</h3>' .
	 							'<p>Мы ведущая клиника и центр косметологии в Краснодаре. Здесь вы пройдете качественную диагностику, лечение заболеваний и коррекцию косметологических проблем с комфортом и максимальной эффективностью. Наша клиника оснащена новейшим медицинским оборудованием, позволяющим выполнять диагностику заболеваний максимально информативно и точно.</p>' .
	 							'<a href="" class="btn btn-indigo">Больше информации об ЭстеЛайф</a>'
            ],
            [
                'banner_id' => 6,
                'title' => 'Проводим обучающие курсы 1',
                'img' => 'images/slide-doctors.png',
                'description' => null,
                'extra' => null,
                'code_banner' => 'home_about_us',
                'full_description' => null
            ],
            [
                'banner_id' => 6,
                'title' => 'Проводим обучающие курсы 2',
                'img' => 'images/slide-doctors.png',
                'description' => null,
                'extra' => null,
                'code_banner' => 'home_about_us',
                'full_description' => null
            ],
            [
                'banner_id' => 6,
                'title' => 'Проводим обучающие курсы 3',
                'img' => 'images/slide-doctors.png',
                'description' => null,
                'extra' => null,
                'code_banner' => 'home_about_us',
                'full_description' => null
            ],
            [
                'banner_id' => null,
                'title' => 'x',
                'img' => 'x',
                'description' => 'Мы ценим то, что вы выбрали нас! Мы делаем все, для того, чтобы стоимость наших услуг была привлекательна и максимально доступна для вас.',
                'extra' => 'x',
                'code_banner' => 'about_company_two_text',
                'full_description' => 'x'
            ],
            [
                'banner_id' => null,
                'title' => 'x',
                'img' => null,
                'description' => 'x',
                'extra' => 'x',
                'code_banner' => 'about_company_two',
                'full_description' => 'x'
            ],
            [
                'banner_id' => null,
                'title' => 'x',
                'img' => null,
                'description' => 'x',
                'extra' => 'x',
                'code_banner' => 'about_company_two',
                'full_description' => 'x'
            ],
            [
                'banner_id' => null,
                'title' => 'x',
                'img' => null,
                'description' => 'x',
                'extra' => 'x',
                'code_banner' => 'about_company_two',
                'full_description' => 'x'
            ],
            [
                'banner_id' => null,
                'title' => 'x',
                'img' => null,
                'description' => 'x',
                'extra' => 'x',
                'code_banner' => 'about_company_certificates',
                'full_description' => 'x'
            ],
            [
                'banner_id' => null,
                'title' => 'x',
                'img' => null,
                'description' => 'x',
                'extra' => 'x',
                'code_banner' => 'about_company_certificates',
                'full_description' => 'x'
            ],
            [
                'banner_id' => null,
                'title' => 'x',
                'img' => null,
                'description' => 'x',
                'extra' => 'x',
                'code_banner' => 'about_company_certificates',
                'full_description' => 'x'
            ],
        ];

        \DB::table('banner_items')->insert($items);
    }
}
