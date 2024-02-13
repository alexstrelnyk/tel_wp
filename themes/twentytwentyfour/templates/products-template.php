<?php
/*
Template Name: Products
*/

get_header();
?>

<section id=":r17:" class="width-wrapper">
    <div class="services-tree">
        <div class="flex-col">
            <div id="cards-tree" class="shelf-content bg-midnight-blue">
                <p class="H3 color-white  italic">Продукти та Послуги</p>
            </div>
            <div class="slider-container bg-midnight-blue">
                <div class="slider-side-bar bg-midnight-blue">
                    <p class="Sub color-white ">НАШІ ПРОДУКТИ ТА ПОСЛУГИ</p>
                </div>
                <div class="services-slider" style="transform: translateX(0px);">

                    <?php

                    $categories = get_categories(['parent' => 0]);

                    if (!empty($categories)) {
                        foreach ($categories as $category) {
                            if (in_array($category->cat_name, [
                                'blog',
                                'news',
                            ])) {
                                continue;
                            }

                            $image = get_field('category_image', 'category_' . $category->cat_ID);
                    ?>
                            <div class="services-card light-blue" data-cat="<?php echo $category->cat_ID ?>" data-cat_title="<?php echo $category->cat_name ?>">
                                <?php if ($image) { ?>
                                    <div class="image"><img loading="lazy" src="<?php echo $image['url'] ?>" alt="<?php echo $image['name'] ?>"></div>
                                <?php } ?>
                                <div class="desc">
                                    <p class="H5 color-white  bold"><?php echo $category->name ?></p>
                                    <p class="H6 color-white medium"></p>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>

<section id=":r18:" class="width-wrapper">
    <div class="banner bg-white">
        <div class="banner-container" style="animation-duration: 30s;">
            <div class="ticker frc">
                <p class="H1 color-black  italic">Ready to start your project?</p>
                <div class="bg-dark-blend-a separator flex-col"><span>Professionalism.</span><span>People.</span><span>Persistance.</span><span>Perception.</span></div>
            </div>
            <div class="ticker frc reverse">
                <p class="H1 color-black  italic">Ready to start your project?</p>
                <div class="bg-dark-blend-a separator flex-col"><span>Professionalism.</span><span>People.</span><span>Persistance.</span><span>Perception.</span></div>
            </div>
        </div>
    </div>
</section>

<section id=":r1a:" class="width-wrapper">
    <div class="quotes bg-soft-blue">
        <div class="quotes-slider" style="transform: translateX(0px);">
            <div class="quote-container">
                <div class="single-quote">
                    <p class="H4 color-grey-blue title non-selectable italic">Мобільний додаток працює як швейцарський годинник – без помилок і збоїв.</p>
                    <p class="Body color-grey-blue description non-selectable italic">Зовнішній вигляд та інтерфейс були зроблені ідеально, тому наші потенційні партнери здивувалися. Це те, що можна назвати «зроблено з пристрастю», а не лише задля грошей. Для стартапу завжди важливо зустріти людей, які поділяють твої задуми та прагнення. Telesens перевершив наші очікування, що позначилося на технічній складовій.</p>
                    <p class="Body2 color-grey-blue non-selectable">Отто Шварц</p>
                    <p class="Body2 color-grey-blue non-selectable">Засновник компанії, Food Technology</p>
                </div>
            </div>
            <div class="quote-container">
                <div class="single-quote">
                    <p class="H4 color-grey-blue title non-selectable italic">Телесенс підтвердив свій високий професійний статус, компетентність та активність у вирішенні задач з розвитку та підтримки системи.</p>
                    <p class="Body color-grey-blue description non-selectable italic">Всі роботи виконано вчасно та якісно. Ми задоволені компетентністю Telesens і готові рекомендувати цю компанію як надійного та відповідального партнера. Telesens надав чудовий рівень обслуговування та підтримки клієнтів. Вони гнучкі в переговорах, суворі і точні у виконанні роботи.</p>
                    <p class="Body2 color-grey-blue non-selectable">Дмитро Гонтар</p>
                    <p class="Body2 color-grey-blue non-selectable">Начальник відділу ІТ, АТ «Київстар»</p>
                </div>
            </div>
            <div class="quote-container">
                <div class="single-quote">
                    <p class="H4 color-grey-blue title non-selectable italic">Я була вражена тим, як Telesens вдалося вирішити всі проблеми, для яких ми їх найняли.</p>
                    <p class="Body color-grey-blue description non-selectable italic">Завдяки Telesens ми отримали програму без помилок. Крім того, вони внесли деякі покращення, які дійсно добре виглядають у поточній програмі. Вони також були уважні до деталей і виправили дрібні проблеми.</p>
                    <p class="Body2 color-grey-blue non-selectable">Інга Сокольникова</p>
                    <p class="Body2 color-grey-blue non-selectable">Керівниця програми, Selfie Lift Face Fitness App</p>
                </div>
            </div>
            <div class="quote-container">
                <div class="single-quote">
                    <p class="H4 color-grey-blue title non-selectable italic">Спілкування з командою Telesens бездоганне.</p>
                    <p class="Body color-grey-blue description non-selectable italic">Наш клієнт отримав рішення для синхронізації складів запчастин та автоматизації процесів замовлення між усіма локаціями, що є принципово важливим для оптимізації бізнес-процесів. Діяльність Telesens прозора, тому компанія укомплектувала проєкт належним чином та відповідно до термінів. Telesens повністю занурився в галузь перед початком проєкту, приділивши час, щоб зрозуміти особливості. Вони продемонстрували це краще, ніж будь-яка інша команда, з якою ми до цього працювали.</p>
                    <p class="Body2 color-grey-blue non-selectable">Роман Хенчке</p>
                    <p class="Body2 color-grey-blue non-selectable">Генеральний директор, AMDIS Media &amp; IT Services GmbH</p>
                </div>
            </div>
            <div class="quote-container">
                <div class="single-quote">
                    <p class="H4 color-grey-blue title non-selectable italic">Ми отримали рішення, яке налаштовується і масштабується, виставляючи рахунки за interconnect трафік.</p>
                    <p class="Body color-grey-blue description non-selectable italic">З його впровадженням ми перейшли до автоматизованої взаємодії та високоефективного управління інтерконектом. Важливою перевагою є оптимізація витрат. Ми задоволені кінцевим продуктом. Здатність Telesens адаптуватися, щоб відповідати нашим запитам, надзвичайно цінна. Крім того, можливості, які вони пропонують, є базовими в їхньому бізнес-пакеті та передбачають клієнтські потреби.</p>
                    <p class="Body2 color-grey-blue non-selectable">Олег Балабан</p>
                    <p class="Body2 color-grey-blue non-selectable">Бізнес- і фінансовий аналітик, Golden Telecom</p>
                </div>
            </div>
            <div class="quote-container">
                <div class="single-quote">
                    <p class="H4 color-grey-blue title non-selectable italic">Команда Telesens добре попрацювала над моїм проєктом.</p>
                    <p class="Body color-grey-blue description non-selectable italic">Нам потрібно було розробити функціональні можливості, які дозволять організаціям переказувати кошти безпосередньо на банківські рахунки бенефіціарів. Крім того, у нас були помилки, які потрібно було виправити під час загальних покращень платформи. Telesens ретельно дослідив можливі рішення. Також вони створили рекомендації, як рухатися далі. Мені дуже сподобалося працювати з командою, вони були терплячими та уважними до моїх запитань і задач. Ми змогли чітко зрозуміти, що потрібно з обох сторін, щоб проєкт рухався швидко та завершився вчасно.</p>
                    <p class="Body2 color-grey-blue non-selectable">Бабатунде Аджао</p>
                    <p class="Body2 color-grey-blue non-selectable">Генеральний директор, True Given</p>
                </div>
            </div>
            <div class="quote-container">
                <div class="single-quote">
                    <p class="H4 color-grey-blue title non-selectable italic">Ця співпраця виявилася надзвичайно плідною і її слід відзначити як високопрофесійну.</p>
                    <p class="Body color-grey-blue description non-selectable italic">Поряд із відмінною професійною компетенцією у сфері платформи UNIX та бази даних Oracle, спеціалісти Telesens продемонстрували дуже хороші здібності вирішення проблем, а також чудові мовні та комунікативні навички. Від імені Deutsche Telekom AG висловлюємо подяку компанії Telesens та команді розробників за успішну співпрацю.</p>
                    <p class="Body2 color-grey-blue non-selectable">Ульріх Гофман</p>
                    <p class="Body2 color-grey-blue non-selectable">Deutsche Telekom AG</p>
                </div>
            </div>
            <div class="quote-container">
                <div class="single-quote">
                    <p class="H4 color-grey-blue title non-selectable italic">Слід відзначити, що завдяки високому професійному рівню фахівців Telesens і нашого альянсу, ми залишили дуже хороші результати в телекомунікаційному бізнесі на території СНД і Туреччини.</p>
                    <p class="Body color-grey-blue description non-selectable italic">Фахівці та спеціалізовані команди Telesens брали участь у понад 50 спільних проєктах телекомунікаційної галузі, головним чином спеціалізуючись на посередництві, доменах надання послуг та впровадженні VAS (рішень MNP та RBT). Окремої вдячності заслуговує професійний рівень та особисте ставлення співробітників Telesens. Добре налагоджені внутрішні бізнес-процеси компанії дозволили бездоганно виконати всі проєкти, вчасно та згідно з зазначеним бюджетом. NSN цінує взаємні послуги, надані в рамках співпраці NSN-Telesens. Особлива подяка компанії Telesens та її співробітникам за високу якість впровадження, розробки та послуг технічної підтримки в спільно реалізованих проєктах для кінцевих споживачів NSN. Ми розраховуємо на подальшу плідну співпрацю і рекомендуємо Telesens як професійного, надійного та гідного партнера.</p>
                    <p class="Body2 color-grey-blue non-selectable">Сергій Григорук</p>
                    <p class="Body2 color-grey-blue non-selectable">EAST Region Service SPOC CSSC NOKIA</p>
                </div>
            </div>
            <div class="quote-container">
                <div class="single-quote">
                    <p class="H4 color-grey-blue title non-selectable italic">За час співпраці Telesens підтвердив свій високий професійний статус, компетентність та активність у вирішенні задач розвитку та супроводу системи розрахунків T-Interconnect між операторами зв'язку.</p>
                    <p class="Body color-grey-blue description non-selectable italic">Всі роботи виконуються вчасно, в строго обумовлені терміни і з належною якістю. Хочеться відзначити високий професіоналізм фахівців компанії Telesens і їхню здатність швидко реагувати на вимоги бізнесу, що зростає і розвивається, – нашої компанії, а також на запити наших співробітників. Ми задоволені роботою Telesens і готові рекомендувати цю компанію як надійного та відповідального партнера.</p>
                    <p class="Body2 color-grey-blue non-selectable">Олександр Требухін</p>
                    <p class="Body2 color-grey-blue non-selectable">Віце-президент, комерційний директор, ALTEL</p>
                </div>
            </div>
            <div class="quote-container">
                <div class="single-quote">
                    <p class="H4 color-grey-blue title non-selectable italic">Їхній клієнтоорієнтований підхід до взаємодії, управління розкладом і прозорість процесу вразили.</p>
                    <p class="Body color-grey-blue description non-selectable italic">Telesens здатні контролювати операції і перевіряти фактичний стан виконання проєкту. Спроможність їхніх менеджерів вносити зміни та контролювати їх, а також виконувати угоди – унікальна.</p>
                    <p class="Body2 color-grey-blue non-selectable">Юрій Потієнко</p>
                    <p class="Body2 color-grey-blue non-selectable">Старший проджект менеджер, Vodafone Україна</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php

echo get_post_field('post_content', get_queried_object_id());

get_footer();
