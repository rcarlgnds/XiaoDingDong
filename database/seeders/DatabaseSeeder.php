<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['UserID' => 'ID000',
                'UserName' => 'Admin',
                'UserEmail' => 'Admin@gmail.com',
                'UserPhoneNumber' => '08121234123',
                'UserAddress' => '729',
                'UserPassword' => bcrypt('Admin123'),
                'UserProfileImage' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQBQhhXRCZO3CC9-6G5cKNraRjWoCbZGTpEmw&usqp=CAU',
                'Role' => 'Admin']
        ];
        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }

        $cartHeaders = [
            ['CartID' => 'CA000',
                'UserID' => 'ID000']
        ];
        foreach ($cartHeaders as $cartHeader) {
            DB::table('cart_headers')->insert($cartHeader);
        }

        $foodTypes = [
            ['FoodTypeID' => 'FT001', 'FoodTypeName' => 'Main Course'],
            ['FoodTypeID' => 'FT002', 'FoodTypeName' => 'Beverages'],
            ['FoodTypeID' => 'FT003', 'FoodTypeName' => 'Desserts'],
        ];
        foreach ($foodTypes as $foodType) {
            DB::table('food_types')->insert($foodType);
        }

        $mainCourses = [
            ['name' => 'Kung Pao Chicken', 'price' => 12, 'FoodImage' => 'KungPaoChicken.png', 'FoodBriefDescription' => 'Spicy chicken stir-fry with peanuts', 'FoodFullDescription' => 'Kung Pao Chicken is a classic Sichuan dish that features diced chicken stir-fried with peanuts, vegetables, and a spicy sauce. It offers a perfect balance of flavors with its combination of heat, nuttiness, and savory goodness.'],
            ['name' => 'Sweet and Sour Pork', 'price' => 10, 'FoodImage' => 'SweetAndSourPork.png', 'FoodBriefDescription' => 'Tangy and crispy pork bites', 'FoodFullDescription' => 'Sweet and Sour Pork is a popular Chinese dish that consists of tender pork pieces that are breaded, deep-fried until crispy, and then tossed in a tangy sauce. The dish is known for its contrasting flavors of sweetness and sourness, making it a delightful choice.'],
            ['name' => 'General Tso\'s Chicken', 'price' => 11, 'FoodImage' => 'GeneralTsoChicken.png', 'FoodBriefDescription' => 'Crispy chicken in a sweet and spicy sauce', 'FoodFullDescription' => 'General Tso\'s Chicken is a well-known Chinese-American dish that features crispy chicken bites coated in a sweet and slightly spicy sauce. It is often garnished with green onions and sesame seeds, adding a touch of freshness and nuttiness to the dish.'],
            ['name' => 'Mongolian Beef', 'price' => 14, 'FoodImage' => 'MongolianBeef.png', 'FoodBriefDescription' => 'Savory beef stir-fry with scallions', 'FoodFullDescription' => 'Mongolian Beef is a flavorful dish that consists of thinly sliced beef stir-fried with scallions and a savory sauce. The beef is typically tender and the sauce offers a perfect balance of salty and savory flavors.'],
            ['name' => 'Mapo Tofu', 'price' => 9, 'FoodImage' => 'MapoTofu.png', 'FoodBriefDescription' => 'Spicy tofu with minced meat', 'FoodFullDescription' => 'Mapo Tofu is a popular Sichuan dish that features soft tofu cubes cooked in a spicy and flavorful sauce with minced meat, usually pork or beef. It is known for its fiery flavors and the silky texture of the tofu.'],
            ['name' => 'Orange Chicken', 'price' => 13, 'FoodImage' => 'OrangeChicken.png', 'FoodBriefDescription' => 'Crispy chicken in a tangy orange sauce', 'FoodFullDescription' => 'Orange Chicken is a delightful dish that consists of crispy chicken pieces coated in a tangy orange sauce. The sauce is typically made with orange juice, vinegar, and other flavorful ingredients, creating a harmonious blend of sweet and citrusy flavors.'],
            ['name' => 'Sesame Chicken', 'price' => 11, 'FoodImage' => 'SesameChicken.png', 'FoodBriefDescription' => 'Crispy chicken with a nutty sesame glaze', 'FoodFullDescription' => 'Sesame Chicken is a popular Chinese dish that features breaded and deep-fried chicken pieces glazed with a sweet and nutty sesame sauce. The dish is often garnished with sesame seeds, adding a pleasant crunch and aroma.'],
            ['name' => 'Beijing Beef', 'price' => 12, 'FoodImage' => 'BeijingBeef.png', 'FoodBriefDescription' => 'Crispy beef in a savory sauce', 'FoodFullDescription' => 'Beijing Beef is a flavorful dish that consists of thinly sliced beef that is deep-fried until crispy and then tossed in a savory sauce. The sauce typically has a combination of sweet, savory, and tangy flavors, making it a delicious choice.'],
            ['name' => 'Cashew Chicken', 'price' => 10, 'FoodImage' => 'CashewChicken.png', 'FoodBriefDescription' => 'Chicken stir-fry with cashew nuts', 'FoodFullDescription' => 'Cashew Chicken is a classic Chinese dish that features tender chicken pieces stir-fried with crunchy cashew nuts and vegetables. The dish is known for its combination of textures, flavors, and the richness of cashew nuts.'],
            ['name' => 'Hunan Shrimp', 'price' => 14, 'FoodImage' => 'HunanShrimp.png', 'FoodBriefDescription' => 'Spicy shrimp stir-fry', 'FoodFullDescription' => 'Hunan Shrimp is a spicy and flavorful dish that consists of succulent shrimp stir-fried with a variety of vegetables in a spicy sauce. The dish is known for its bold and vibrant flavors, making it a favorite among spicy food lovers.'],
            ['name' => 'Sweet and Sour Chicken', 'price' => 12, 'FoodImage' => 'SweetAndSourChicken.png', 'FoodBriefDescription' => 'Tangy chicken with colorful vegetables', 'FoodFullDescription' => 'Sweet and Sour Chicken is a classic Chinese dish that features tender chicken pieces coated in a sweet and tangy sauce. The dish also includes a colorful array of vegetables, such as bell peppers, pineapple, and onions, adding freshness and crunch to the dish.'],
            ['name' => 'Garlic Beef', 'price' => 13, 'FoodImage' => 'GarlicBeef.png', 'FoodBriefDescription' => 'Beef stir-fry with garlic-infused sauce', 'FoodFullDescription' => 'Garlic Beef is a flavorful dish that consists of thinly sliced beef stir-fried with garlic-infused sauce. The dish highlights the aromatic and pungent flavors of garlic, which pair beautifully with the savory beef.'],
            ['name' => 'Kung Pao Shrimp', 'price' => 11, 'FoodImage' => 'KungPaoShrimp.png', 'FoodBriefDescription' => 'Spicy shrimp stir-fry with peanuts', 'FoodFullDescription' => 'Kung Pao Shrimp is a spicy and savory dish that features succulent shrimp stir-fried with peanuts, vegetables, and a spicy sauce. The dish offers a delightful combination of heat, crunch from the peanuts, and succulent shrimp.'],
            ['name' => 'General Tso\'s Tofu', 'price' => 10, 'FoodImage' => 'GeneralTsoTofu.png', 'FoodBriefDescription' => 'Crispy tofu in a sweet and spicy sauce', 'FoodFullDescription' => 'General Tso\'s Tofu is a vegetarian version of the popular General Tso\'s Chicken. It features crispy tofu cubes that are coated in a sweet and slightly spicy sauce. The tofu absorbs the flavors of the sauce and becomes crispy on the outside, offering a delightful texture.'],
            ['name' => 'Sweet and Sour Fish', 'price' => 14, 'FoodImage' => 'SweetAndSourFish.png', 'FoodBriefDescription' => 'Crispy fish fillets in a tangy sauce', 'FoodFullDescription' => 'Sweet and Sour Fish is a popular Chinese dish that features crispy fish fillets coated in a tangy sauce. The fish is typically deep-fried until golden brown, creating a crispy exterior while keeping the flesh tender and moist. The sweet and sour sauce adds a delightful balance of flavors to the dish, making it a favorite among seafood lovers.'],
        ];
        $foodID = 'FO000';
        foreach ($mainCourses as $mainCourse) {
            DB::table('foods')->insert([
                'FoodID' => ++$foodID,
                'FoodTypeID' => 'FT001',
                'FoodName' => $mainCourse['name'],
                'FoodPrice' => $mainCourse['price'],
                'FoodImage' => $mainCourse['FoodImage'],
                'FoodBriefDescription' => $mainCourse['FoodBriefDescription'],
                'FoodFullDescription' => $mainCourse['FoodFullDescription'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        $beverages = [
            ['name' => 'Bubble Tea', 'price' => 5, 'FoodImage' => 'BubbleTea.png', 'FoodBriefDescription' => 'Refreshing tea-based drink with tapioca pearls', 'FoodFullDescription' => 'Bubble Tea is a popular Taiwanese drink that combines tea (often black or green tea) with milk or fruit flavors. It is typically served cold and includes chewy tapioca pearls, also known as boba, which add a unique texture to the drink. Bubble Tea comes in various flavors and can be customized with different types of teas, toppings, and sweetness levels.'],
            ['name' => 'Jasmine Tea', 'price' => 2, 'FoodImage' => 'JasmineTea.png', 'FoodBriefDescription' => 'Delicate and aromatic floral tea', 'FoodFullDescription' => 'Jasmine Tea is a fragrant and aromatic tea made by scenting green tea leaves with jasmine blossoms. The tea has a delicate floral aroma and a slightly sweet taste. It is often enjoyed on its own or as a refreshing accompaniment to meals.'],
            ['name' => 'Chinese Herbal Tea', 'price' => 3, 'FoodImage' => 'ChineseHerbalTea.png', 'FoodBriefDescription' => 'Traditional Chinese medicinal tea', 'FoodFullDescription' => 'Chinese Herbal Tea is a type of tea made from a combination of various herbs and botanicals. It is known for its therapeutic properties and is often consumed for its potential health benefits. Chinese Herbal Tea can have different flavors and uses depending on the specific herbs used in its preparation.'],
            ['name' => 'Soy Milk', 'price' => 2, 'FoodImage' => 'SoyMilk.png', 'FoodBriefDescription' => 'Plant-based milk alternative', 'FoodFullDescription' => 'Soy Milk is a popular plant-based milk alternative made from soybeans. It has a creamy texture and a slightly nutty flavor. Soy Milk is rich in protein and is often used as a dairy milk substitute in various recipes and beverages.'],
            ['name' => 'Chinese Rice Wine', 'price' => 8, 'FoodImage' => 'ChineseRiceWine.png', 'FoodBriefDescription' => 'Traditional Chinese alcoholic beverage', 'FoodFullDescription' => 'Chinese Rice Wine, also known as Huangjiu, is a traditional Chinese alcoholic beverage made from fermented glutinous rice. It has a slightly sweet and fragrant taste and is often enjoyed as an accompaniment to meals or used in cooking. Chinese Rice Wine comes in different varieties, ranging from dry to sweet and with varying levels of alcohol content.'],
            ['name' => 'Green Tea', 'price' => 3, 'FoodImage' => 'GreenTea.png', 'FoodBriefDescription' => 'Light and refreshing tea', 'FoodFullDescription' => 'Green Tea is a type of tea made from the leaves of the Camellia sinensis plant that have undergone minimal oxidation during processing. It has a delicate and fresh flavor with grassy undertones. Green Tea is known for its potential health benefits and is a popular beverage choice worldwide.'],
            ['name' => 'Oolong Tea', 'price' => 3, 'FoodImage' => 'OolongTea.png', 'FoodBriefDescription' => 'Semi-oxidized tea with a complex flavor profile', 'FoodFullDescription' => 'Oolong Tea is a traditional Chinese tea that falls between green tea and black tea in terms of oxidation. It has a complex flavor profile that can range from light and floral to rich and toasty, depending on the specific variety. Oolong Tea is often enjoyed for its unique characteristics and is known for its potential health benefits.'],
            ['name' => 'Coconut Water', 'price' => 4, 'FoodImage' => 'CoconutWater.png', 'FoodBriefDescription' => 'Naturally hydrating and refreshing drink', 'FoodFullDescription' => 'Coconut Water is the clear liquid found inside coconuts. It is a natural and isotonic beverage known for its hydrating properties and refreshing taste. Coconut Water is rich in electrolytes and is often consumed as a natural sports drink or enjoyed as a standalone beverage.'],
            ['name' => 'Lemonade', 'price' => 3, 'FoodImage' => 'Lemonade.png', 'FoodBriefDescription' => 'Classic citrus-based beverage', 'FoodFullDescription' => 'Lemonade is a popular citrus-based beverage made from fresh lemon juice, water, and sweeteners such as sugar or honey. It is known for its tangy and refreshing flavor, making it a popular choice during hot summer months. Lemonade can be served chilled or over ice for a cool and revitalizing drink.'],
            ['name' => 'Fruit Punch', 'price' => 4, 'FoodImage' => 'FruitPunch.png', 'FoodBriefDescription' => 'Tropical and fruity mixed drink', 'FoodFullDescription' => 'Fruit Punch is a vibrant and fruity mixed drink made by combining various fruit juices, such as pineapple, orange, and cranberry, with other ingredients like soda or ginger ale. It is often garnished with fresh fruit slices and is a popular choice for parties and gatherings. Fruit Punch offers a sweet and tropical taste that appeals to both children and adults.'],
            ['name' => 'Mango Smoothie', 'price' => 5, 'FoodImage' => 'MangoSmoothie.png', 'FoodBriefDescription' => 'Creamy and tropical blended beverage', 'FoodFullDescription' => 'Mango Smoothie is a creamy and refreshing blended beverage made from ripe mangoes, yogurt or milk, and ice. It has a smooth and velvety texture with a sweet and tangy flavor. Mango Smoothie is a popular choice for those seeking a tropical and indulgent drink that can be enjoyed as a snack or meal replacement.'],
            ['name' => 'Lychee Juice', 'price' => 3, 'FoodImage' => 'LycheeJuice.png', 'FoodBriefDescription' => 'Sweet and fragrant tropical fruit juice', 'FoodFullDescription' => 'Lychee Juice is a sweet and fragrant tropical fruit juice made from the pulp of lychee fruits. It has a distinctive floral aroma and a delicate, refreshing taste. Lychee Juice is often enjoyed on its own or used as a base for cocktails and mocktails. It provides a burst of tropical flavor and is especially popular in Asian cuisine.'],
            ['name' => 'Honey Lemon Tea', 'price' => 3, 'FoodImage' => 'HoneyLemonTea.png', 'FoodBriefDescription' => 'Soothing and aromatic tea with honey and lemon', 'FoodFullDescription' => 'Honey Lemon Tea is a soothing and aromatic tea made by combining hot water, honey, and fresh lemon juice. It is known for its calming properties and is often consumed to alleviate sore throats or as a comforting beverage. Honey Lemon Tea offers a perfect balance of sweetness and citrus tang, creating a delightful and warming drink.'],
            ['name' => 'Iced Coffee', 'price' => 4, 'FoodImage' => 'IcedCoffee.png', 'FoodBriefDescription' => 'Chilled coffee beverage for coffee lovers', 'FoodFullDescription' => 'Iced Coffee is a chilled coffee beverage made by pouring brewed coffee over ice and often mixed with milk or sweeteners. It provides a refreshing and energizing way to enjoy coffee, especially during hot weather. Iced Coffee can be customized with various flavors, syrups, and toppings to suit personal preferences. It is a popular choice for coffee lovers looking for a cool and invigorating drink.'],
            ['name' => 'Strawberry Milkshake', 'price' => 5, 'FoodImage' => 'StrawberryMilkshake.png', 'FoodBriefDescription' => 'Creamy and fruity blended drink', 'FoodFullDescription' => 'Strawberry Milkshake is a creamy and indulgent blended beverage made by blending fresh strawberries, milk, and ice cream. It has a smooth and velvety texture with a sweet and fruity flavor. Strawberry Milkshake is a beloved classic that offers a delightful combination of strawberries and dairy, creating a rich and satisfying treat. It is a popular choice for dessert or as a sweet indulgence.'],
        ];

        foreach ($beverages as $beverage) {
            DB::table('foods')->insert([
                'FoodID' => ++$foodID,
                'FoodTypeID' => 'FT002',
                'FoodName' => $beverage['name'],
                'FoodPrice' => $beverage['price'],
                'FoodImage' => $beverage['FoodImage'],
                'FoodBriefDescription' => $beverage['FoodBriefDescription'],
                'FoodFullDescription' => $beverage['FoodFullDescription'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


        $desserts = [
            ['name' => 'Egg Custard Tart', 'price' => 3, 'FoodImage' => 'EggCustardTart.png', 'FoodBriefDescription' => 'Delicious tart with creamy egg custard filling', 'FoodFullDescription' => 'Egg Custard Tart is a delightful pastry with a flaky crust and a creamy egg custard filling. The custard is made with eggs, milk, and sugar, resulting in a rich and velvety texture. The tart is baked to perfection, creating a golden crust that complements the smooth custard filling. Egg Custard Tarts are popular in various cuisines and are often enjoyed as a sweet treat or dessert. Their balanced sweetness and comforting flavors make them a favorite among pastry lovers.'],
            ['name' => 'Sesame Balls', 'price' => 4, 'FoodImage' => 'SesameBalls.png', 'FoodBriefDescription' => 'Chewy glutinous rice balls with a sweet sesame filling', 'FoodFullDescription' => 'Sesame Balls, also known as Jian Dui or Jin Deui, are traditional Chinese pastries made from glutinous rice flour. They are deep-fried to achieve a crispy outer layer while maintaining a chewy texture inside. Sesame Balls are typically filled with a sweet paste made from red bean, lotus seed, or black sesame. These bite-sized treats are popular for their delightful combination of textures and flavors, with a slightly nutty taste from the sesame seeds.'],
            ['name' => 'Mango Pudding', 'price' => 4, 'FoodImage' => 'MangoPudding.png', 'FoodBriefDescription' => 'Smooth and creamy dessert with fresh mango flavor', 'FoodFullDescription' => 'Mango Pudding is a smooth and creamy dessert made with ripe mangoes, gelatin, and milk. It has a velvety texture and a refreshing tropical flavor. Mango Pudding is a popular choice during the summer months when mangoes are in season. It is often served chilled and garnished with fresh mango slices or a dollop of whipped cream. This sweet and fruity dessert is loved by mango enthusiasts and dessert lovers alike.'],
            ['name' => 'Red Bean Soup', 'price' => 3, 'FoodImage' => 'RedBeanSoup.png', 'FoodBriefDescription' => 'Warm and comforting soup with sweet red beans', 'FoodFullDescription' => 'Red Bean Soup, also known as Hong Dou Tang, is a traditional Chinese dessert soup made from red beans (adzuki beans), water, and sugar. The beans are cooked until soft, resulting in a thick and velvety soup with a naturally sweet flavor. Red Bean Soup is often enjoyed as a warm and comforting treat during colder months or as a soothing dessert after a meal. It is sometimes served with glutinous rice balls or other sweet ingredients for added texture and flavor.'],
            ['name' => 'Almond Tofu', 'price' => 3, 'FoodImage' => 'AlmondTofu.png', 'FoodBriefDescription' => 'Smooth and silky tofu-based dessert with almond flavor', 'FoodFullDescription' => 'Almond Tofu is a silky and delicate dessert made from tofu, almond extract, and sugar. It has a creamy and smooth texture similar to traditional gelatin-based desserts but is entirely plant-based. Almond Tofu is often served chilled and can be enjoyed plain or with a drizzle of sweet syrup or a sprinkle of crushed almonds for added crunch. This light and refreshing dessert is a popular choice for those seeking a dairy-free or vegan-friendly option.'],
            ['name' => 'Coconut Ice Cream', 'price' => 5, 'FoodImage' => 'CoconutIceCream.png', 'FoodBriefDescription' => 'Creamy and tropical ice cream with coconut flavor', 'FoodFullDescription' => 'Coconut Ice Cream is a delicious frozen dessert with a rich and creamy texture and a tropical coconut flavor. It is made from a combination of coconut milk or cream, sugar, and other ingredients. The ice cream is churned until smooth and frozen to perfection. Coconut Ice Cream is often enjoyed on its own or as a topping for other desserts such as cakes, pies, or fruit. Its refreshing taste and delightful aroma make it a popular choice, especially in warm climates or during the summer season.'],
            ['name' => 'Honeydew Sago', 'price' => 4, 'FoodImage' => 'HoneydewSago.png', 'FoodBriefDescription' => 'Refreshing dessert with honeydew melon and sago pearls', 'FoodFullDescription' => 'Honeydew Sago is a refreshing dessert made with diced honeydew melon, sago pearls, and a sweet coconut milk base. The honeydew melon adds a subtle sweetness and a vibrant green color to the dessert, while the sago pearls provide a chewy texture. Honeydew Sago is commonly served chilled and is a popular choice during the summer months for its cooling and light flavors. It is enjoyed by those who appreciate the combination of fruity, creamy, and chewy elements in a dessert.'],
            ['name' => 'Pineapple Cake', 'price' => 3, 'FoodImage' => 'PineappleCake.png', 'FoodBriefDescription' => 'Buttery pastry filled with pineapple jam', 'FoodFullDescription' => 'Pineapple Cake is a popular Taiwanese pastry made with a buttery and crumbly dough filled with sweet pineapple jam. The pineapple jam is made from fresh pineapples, cooked down to a thick and fragrant filling. The pastry is shaped into small rectangular cakes and baked until golden brown. Pineapple Cakes are often enjoyed with tea and are a beloved treat during festive occasions and as gifts. The combination of the buttery pastry and tangy-sweet pineapple filling makes this pastry a delightful indulgence.'],
            ['name' => 'Steamed Taro Cake', 'price' => 4, 'FoodImage' => 'SteamedTaroCake.png', 'FoodBriefDescription' => 'Soft and savory cake made with taro root', 'FoodFullDescription' => 'Steamed Taro Cake, also known as Wu Tao Gao, is a traditional Chinese dessert made from grated taro root, rice flour, and other ingredients. The mixture is steamed to create a soft and slightly sticky cake with a delicate taro flavor. Steamed Taro Cake is often enjoyed as a dim sum dish or as a sweet treat. It can be served plain or topped with ingredients like dried shrimp, mushrooms, and scallions for added savory flavors. This comforting and satisfying cake appeals to those who enjoy the unique taste and texture of taro.'],
            ['name' => 'Black Sesame Soup', 'price' => 3, 'FoodImage' => 'BlackSesameSoup.png', 'FoodBriefDescription' => 'Smooth and aromatic soup made from black sesame seeds', 'FoodFullDescription' => 'Black Sesame Soup is a smooth and aromatic dessert soup made from ground black sesame seeds, water, and sweeteners such as sugar or honey. The black sesame seeds are roasted and ground to release their natural oils and flavors, resulting in a rich and creamy soup. Black Sesame Soup is often served warm and is enjoyed for its nutty and toasty taste. It is believed to have nourishing properties and is a popular dessert choice in Chinese cuisine.'],
            ['name' => 'Mochi', 'price' => 4, 'FoodImage' => 'Mochi.png', 'FoodBriefDescription' => 'Soft and chewy rice cake with various fillings', 'FoodFullDescription' => 'Mochi is a traditional Japanese rice cake made from glutinous rice flour. It has a soft and chewy texture and is often filled with sweet fillings such as red bean paste, matcha green tea, or fruit flavors. Mochi is typically served during special occasions and festivals, and it is enjoyed by people of all ages. It can be eaten plain or used as an ingredient in other desserts. Mochi is a delightful treat that offers a unique combination of flavors and textures.'],
            ['name' => 'Longan Jelly', 'price' => 3, 'FoodImage' => 'LonganJelly.png', 'FoodBriefDescription' => 'Refreshing jelly dessert made with longan fruit', 'FoodFullDescription' => 'Longan Jelly is a refreshing dessert made with longan fruit, agar agar or gelatin, and a sweet syrup. Longan fruit, which is similar to lychee, has a delicate and sweet flavor that pairs well with the jelly texture. The dessert is often served chilled and can be enjoyed on its own or with additional toppings such as lychee or coconut milk. Longan Jelly is a popular choice during hot summer days for its cooling and light taste.'],
            ['name' => 'Fried Banana', 'price' => 4, 'FoodImage' => 'FriedBanana.png', 'FoodBriefDescription' => 'Crispy and caramelized banana fritters', 'FoodFullDescription' => 'Fried Banana, also known as Banana Fritters, is a popular dessert made by coating ripe bananas in batter and deep-frying them until golden brown. The frying process creates a crispy and caramelized exterior while keeping the inside soft and sweet. Fried Banana can be served plain or with a dusting of powdered sugar, a drizzle of honey or chocolate sauce, or a scoop of ice cream. It is enjoyed in many cuisines worldwide and offers a comforting and indulgent treat for banana lovers.'],
            ['name' => 'Snow Fungus Soup', 'price' => 3, 'FoodImage' => 'SnowFungusSoup.png', 'FoodBriefDescription' => 'Nourishing soup made with snow fungus and sweet ingredients', 'FoodFullDescription' => 'Snow Fungus Soup is a nourishing dessert soup made from snow fungus, a type of edible mushroom, and sweet ingredients such as rock sugar, dried longan, and red dates. Snow fungus has a gelatinous texture when cooked, adding a unique mouthfeel to the soup. The soup is known for its collagen-boosting properties and is believed to promote healthy skin and overall well-being. Snow Fungus Soup is often served warm and is appreciated for its gentle sweetness and comforting nature.'],
            ['name' => 'Red Bean Pancake', 'price' => 4, 'FoodImage' => 'RedBeanPancake.png', 'FoodBriefDescription' => 'Thin pancake filled with sweet red bean paste', 'FoodFullDescription' => 'Red Bean Pancake, also known as Dorayaki, is a traditional Japanese dessert made from two thin pancakes filled with sweet red bean paste. The pancakes are fluffy and slightly sweet, while the red bean paste provides a smooth and earthy sweetness. Red Bean Pancakes are often enjoyed as a snack or dessert, and they pair well with a cup of tea or coffee. The combination of textures and flavors makes Red Bean Pancakes a beloved treat in Japanese cuisine.'],
        ];

        foreach ($desserts as $dessert) {
            DB::table('foods')->insert([
                'FoodID' => ++$foodID,
                'FoodTypeID' => 'FT003',
                'FoodName' => $dessert['name'],
                'FoodPrice' => $dessert['price'],
                'FoodImage' =>$dessert['FoodImage'],
                'FoodBriefDescription' => $dessert['FoodBriefDescription'],
                'FoodFullDescription' => $dessert['FoodFullDescription'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
