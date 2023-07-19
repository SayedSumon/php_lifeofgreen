-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20230106.cdc2f37a1d
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 03:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(100) NOT NULL,
  `advisor_id` int(100) NOT NULL,
  `advisor_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `advisor_id`, `advisor_name`, `title`, `description`, `category`, `image`) VALUES
(2, 0, 'admin', '3 Beautifully Scented Plants for the Kitchen', 'Houseplants are a simple way to transform your space, adding a touch of colour and life to your home. They&#39;re even good for you, as they reduce stress and improve air quality and can give a room a new lease of life. Adding a few plants can really brighten up utilitarian rooms like kitchens, and make daily tasks like dishwashing and cooking a little more pleasant. Growing your own herbs and window-sill salad ingredients is environmentally friendly, too. Did you know that nearly 72% of shoppers now take the environmental impact of their shopping choices into consideration when they purchase food and other groceries? Try these three beautifully scented plants in your kitchen:\r\n\r\n\r\n\r\nORCHIDS\r\norchid-beautiful-scented-plant-for-the-kitchen.jpg\r\n\r\nThese exotic looking beauties make a great addition to any kitchen. They come in a variety of different colours and scents, so there&#39;s something for everyone. Try the yellow, lemon-scented Cymbidium Golden Elf. They&#39;re perfect for kitchens as they prefer warmer rooms and they&#39;re also surprisingly easy to look after, as they don&#39;t need daily watering. Instead, just once a week, fill your kitchen sink with a few inches of cold water and set your orchids in to have a drink for about 30 minutes. Voila!\r\n\r\n\r\n\r\nJASMINE\r\njasmine-plant-blossom-flower-beautiful-scented-kitchen.jpg\r\nThe delicate, sweet floral fragrance of jasmine gives your kitchen a touch of elegance and luxury. People have been giving Jasmine flowers different symbolic and spiritual meanings, such as motherhood, purity, devotion or love, so it will add a pleasant touch to your home in any case. There are several varieties that can do well indoors – Arabian jasmine, for example, flowers most of the year. Jasmine thrives in sunny but humid environments. Place it near a window, keep its soil moist, and feed it an all-purpose houseplant fertiliser in the spring and summer months. Once your jasmine plant is well-established and flowering, you could even try making your own jasmine tea!\r\n\r\n\r\n\r\nHERBS\r\nparsley-herbs-scented-plant-for-the-kitchen.jpg\r\n\r\nSome plants can pull triple duty for the senses – they don&#39;t just look pretty and taste incredible, they smell great, too! While all kitchens would benefit from having a windowsill herb garden, there are a few useful herbs that smell especially delicious.\r\n\r\nBasil is an easy to grow, fragrant herb that tastes great in a Caprese salad, topping pizza and pasta dishes, or used as a base for homemade pesto. I’m growing red rubin basil from seeds in my kitchen because it has a stronger flavour and unusual reddish-purple leaves with a higher decorative impact.\r\n\r\nMint has a clean, fresh smell and makes a lovely addition to roast lamb, Middle Eastern dishes like tabouleh, and lemonade. It&#39;s also an essential ingredient in mojitos, and you can even try it as a garnish for desserts, as mint pairs well with chocolate and fruit flavours.\r\n\r\nRosemary is another low-maintenance, great-smelling herb that can be used in a variety of ways. It&#39;s gorgeous with poultry – for an easy roast chicken, just cut a lemon in half and stick it inside a whole chicken with rosemary.\r\n\r\nThyme is a richly aromatic herb. It prefers well-drained soil so do not worry about watering it too much. This low-maintenance herb is green all year round so a great investment and it goes great with eggs. \r\n\r\nLemongrass, lavender, coriander, parsley… I like to go with the season and change throughout the year.\r\n\r\nNote that potted herbs purchased in supermarkets are likely to be harder to maintain on the long run, because they were designed for fast growth and immediate consumption. So, if you’d like to keep herbs alive in the kitchen, head to your local nursery or market and inquire about good quality organic herbs grown in nutrient-rich soil, you will get much better results.\r\n\r\nIf you are into growing your own aromatic herbs, I’ll soon write a blog about irrigated containers that are perfect to grow aromatic herbs. So stay tuned!\r\n\r\n\r\nTip: If you&#39;re ever faced with too much of a good thing and your herbs need to be pruned back to stay on your windowsill, don&#39;t throw away the excess trimmings! Preserve your herbs by drying them on a baking sheet in the oven on a low heat, or mix them with butter or olive oil and freeze them in an ice cube tray to make your own easy to use flavour-bombs.', 'home garden', 'fresh-herbs-scented-potted-plants-kitchen.jpg'),
(3, 0, 'admin', 'How To Get New Leaves on Ficus Lyrata (Fiddle-leaf Fig plant)', 'Fiddle leaf figs, or ficus lyrata, love to be fed! Their large leaves and relatively fast growth demand plenty of nutrition. But how often should you fertilize? The rate that you should fertilize your fiddle leaf fig depends on the season you’re in, how fast you want your plant to grow, and the type of fertilizer you are using.\r\n\r\n\r\nPlants often suffer because of under-fertilization, which leads to slow growth and yellowing leaves. Proper fertilization will give your plant the best health and keep it deep green and gorgeous. Let’s expand more on each of these factors now.\r\n\r\nBut before we start, keep in mind that as pre-requisite for growth, you must keep your plant in ideal growing conditions light and water-wise. An unhealthy plant that’s fighting for its life, that’s overwatered or dried-out, is not going to grow, no matter how much fertilizer you add. Follow the tips on this blog to help you with all things plant care if you need it. See The Basics of Fiddle Leaf Fig Tree Care as a starting point for ficus lyrata specific tips, or the universal advice on How to Water your Indoor Plants the Right Way, which covers all types of houseplants.\r\n\r\nBaby new leaf on my fiddle leaf fig (ficus lyrata)\r\nBaby new leaf on my fiddle leaf fig (ficus lyrata)\r\n\r\n1. FERTILIZING FICUS LYRATA FOR YOUR LOCATION AND SEASON\r\nHouseplants are most active during the spring and summer because of the abundance of light. Fertilization is most important during these times. Your fiddle leaf plant is begging for nutrients and cannot grow and prosper without them.\r\n\r\nDuring the winter, however, your plant isn’t as active with new growth. For this reason, you don’t need to fertilize as much during the winter season. The duration of the winter and the climate will depend on where you live.\r\n\r\nNorthern areas will have colder temperatures as opposed to areas closer to the equator. Therefore, fiddle leaf figs in colder areas will remain more idle, whereas fiddle leaf figs in warmer areas won’t need much rest until they continue their growth process again. In San Diego, for example, we fertilize our fiddle leaf figs all year long and they continue to grow!\r\n\r\n\r\n\r\n\r\n\r\n2. FERTILIZING FICUS LYRATA FOR GROWTH\r\nAll fiddle leaf fig plants need nutrients, whether they are actively growing or not. But those that are growing a lot will deplete their soil of nutrients more quickly. Your fertilizing schedule depends on how fast you’d like your plant to grow.\r\n\r\n\r\nIf you have a young plant that you’d like to grow quickly, you can fertilize with our custom-formulated Fiddle Leaf Fig Plant Food each and every time you water. This ensures that your plant gets a gentle but steady supply of the nutrition it needs. Fiddle leaf figs can grow 12 to 18 inches each year when fed properly and given an abundance of natural light!\r\n\r\n\r\n\r\n\r\nHowever, if it is a large plant and you do not want it to grow larger, you can reduce the feedings to once a month. This will give your fiddle leaf fig enough nutrition to stay healthy and thrive, but will not support robust growth.\r\n\r\n\r\n\r\nUSE CODE BUY1GET10 TO SAVE 10% ON THIS FERTILIZER:\r\nFiddle Leaf Fig Plant Food, available here\r\nFiddle Leaf Fig Plant Food, available here\r\n\r\n3. TYPE OF FERTILIZER THAT IS PERFECT FOR FICUS LYRATA\r\nThere are many types of fertilizer you could use with a fiddle leaf fig. Generally, you must choose either a solid or liquid fertilizer. If you choose a solid fertilizer, you’ll also need to choose whether to use a slow-release product.\r\n\r\n\r\nWhen using a solid fertilizer, be extra careful not to over-fertilize your plant, which can lead to burning the root system. When using a slow-release fertilizer, take care to watch your plant carefully for signs of over or under fertilization. Also keep in mind that some soils have fertilizers in them, so you’ll want to be careful when combining fertilizer products.\r\n\r\n\r\nWe created our liquid Fiddle Leaf Fig Plant Food to be gentle and easy for your plant to absorb, with no risk of burning your root system. It’s formulated to be used every single time you water, like a multivitamin for ficus lyrata. This takes the guesswork out of feeding your plant and you don’t have to remember when you last fertilized.\r\n\r\n\r\nWith any fertilizing routine, watch your plant for signs that it is happy (new growth) or unhappy (yellow leaves or stunted growth). Keep in tune with the natural rhythms of your plant during the growing season and adjust your routine accordingly.\r\n\r\n\r\n\r\n4. FAST GROWING HOUSEPLANTS\r\nDo you also love to see new baby leaves unfurling?\r\n\r\nNewborn leaves as usually paler, shinier, and softer than adult leaves. To me personally, it’s always a joy to witness the birth of a new leaf, because there are so fragile! I admit that I see in a simple leaf being born the entire cycle of life designed by Mother Nature. But okay, enough plant pseudo-spirituality...\r\n\r\n\r\nFor now, you can check out this simple yet useful List of Fast-growing Houseplants that will ravish you with new babies to marvel at more often than average.\r\n\r\n\r\n\r\n5. HEALTHY SOIL & ROOTS FOR A PRETTY HOUSEPLANT\r\nUnderstanding a bit about what happens inside the potting mix of your houseplant can help you care for it better. As always, I’m going to be using simple terms to explain the concepts, so you don’t need to have an MA in horticultural science. The web of roots of the plant constitutes its main feeding organ, where it receives all the nutrients it needs to live and grow properly.\r\n\r\n\r\n\r\nTHE POTTING MIX IS A RESERVOIR OF NUTRIENTS.\r\nWhen you buy a plant, the potting mix comes full of nutrients (the natural nutrients in the soil plus these little capsules added to the potting mix by the grower). The soil contains three vital natural elements for the plant: K, N, and P. These basic elements are responsible for leaf vitality, root health, and even flower blooms. The ideal proportion of each element depends on the species of your plant. After ending up in our homes, the plant keeps eating the nutrients out from the soil, but nutrients don’t get replenished until you either you add fertilizer, add soil to top-up, or repot into fresh soil. The plant needs more nutrients when it’s growing new leaves, or expanding the roots. The right amount depends on the season.\r\n\r\n\r\n\r\nWHAT DOES OVER-WATERING DO TO YOUR PLANT?\r\nOverwatering your plant means that the soil will get saturated with water. If your pot has too little drainage to get rid of this excess water, the plant will not be able to absorb it either. As strange as it may seem, soil is naturally aired and oxygenated, but in overwatered soil the water blocks the oxygen. Oxygen is a key element of healthy soil and therefore root function. Without oxygen from the air, the soil starts to rot, and in turn, the roots become diseased, easily affected by fungus, etc. After some time, the disease in the rotten roots will start to spread on to the leaves, which is when you usually start to see black dots or white powdery mold, etc. and call it a ‘plant SOS’. Caring for the soil’s health is almost everything in keeping your plant healthy on the outside. So first, avoid potting your plant straight into a pot, unless it’s self-watering. It’s actually a good idea to keep the original plastic pot that has built-in drainage holes in it. This way excess water can run through. Even better, you can start to water your plant from below and control the amount of water it’s going to drink. ', 'business garden', 'new-leaf-new-growth-baby-fiddle-leaf-fig.jpg'),
(4, 34, 'advisor sayed', 'How To Create A Plant Loving Home', 'A FULL GUIDE FOR FIRST TIME INDOOR JUNGLE OWNERS \r\nYOU WANT TO DESIGN AN URBAN JUNGLE FOR YOUR NEW HOME?\r\nIn this complete guide, I reveal some of the latest green design ideas and tips to help you design the most fabulous urban jungle for your home. \r\n\r\nURBAN JUNGLE DÉCOR IDEAS\r\nESSENTIAL ACCESSORIES AND TOOLS\r\nWHICH FACTORS AFFECT THE CHOICE OF YOUR NEW PLANT\r\nWHICH PLANTS TO START WITH\r\nCARE TIPS\r\nHappy planting!\r\n\r\nHotel room temporarily filled with plants in London (Leman Locke hotel - design by Michael Perry)\r\nHotel room temporarily filled with plants in London (Leman Locke hotel - design by Michael Perry)\r\n\r\n\r\n\r\n1) URBAN JUNGLE & HOME DÉCOR IDEAS\r\nVARIETY IS KEY\r\nThe essential concept behind any urban jungle is to mimic nature in its extraordinary diversity of species, sizes, forms and colors. \r\n\r\nWhen designing a personal urban jungle at home, variety is key, like in nature. \r\n\r\nThe combination of different sizes of plants is the first step to creating your indoor jungle. For instance, purchase a giant one that goes on the floor and mix it up with some smaller ones. \r\n\r\nTry some plant stands and rope hangers to display your plants at different levels.\r\n\r\nIf you just go for the same textures, like all small leaves or big leaves or prickly, your garden will look boring.\r\n\r\n\r\nMAKE IT PERSONAL\r\nindoor-plant-sanctuary-home-plant-corner.jpg\r\nOften play around with your pots. Prepare some terracotta, copper, etc. then, mix them up. Add candles and personal object close to your heart.\r\n\r\nIf you have some old plant pots or teacups, they will be good materials to customize them with paint. Or, you can find some online or other vintage shops.\r\n\r\nA MULTI-SENSORY EXPERIENCE\r\nThink about your last walk in the forest or in the jungle. Beyond the sight of trees, plants and bushes, what sounds could you hear, what scents could you smell? \r\n\r\nRecreate such memories in your home by adding a plant ASMR or nature sound playlist, or by placing fragrant specimens such as lavender, jasmine or lemongrass. Pot-pourri would do as well. \r\n\r\nTrying to please all the senses, that’s the essence of successful biophilic design and urban jungle design!\r\n\r\nGREEN LIBRARY – BEST FOR HOME OFFICE\r\ngreen-library-plant-shelf-home-office-workspace.jpg\r\nTaking advantage of a surplus library unit at your home and fill it with various kinds of urban jungle plants is a good idea to start with.\r\n\r\nCacti and succulent plants are our first recommendation. They’re cute and small enough to be placed anywhere – in the surplus library unit that you’ve prepared or on the desk.\r\n\r\nSome other plants with similar benefits are Sansevieras Trifasciata, snake plants, Philodendron Cordatum, and Epipremnum Aureum.\r\n\r\n\r\n\r\n\r\nBATHROOM PLANT WALL\r\nIt’s no problem if your bathroom is large or narrow, traditional or ultra-modern, a houseplant or two always create an impressive highlight.\r\n\r\nLocations like a corner rack and tabletop bathroom sink are ideal. You can also stick suction pots on the walls. It really works and the result is impressive!\r\n\r\nBiophilic hotel bathroom in East London (Leman Locke hotel - design by Michael Perry)\r\nBiophilic hotel bathroom in East London (Leman Locke hotel - design by Michael Perry)\r\n\r\n\r\nThe bathroom is the most humid space in your house, implying an ideal tropical condition that certain plants will love.\r\n\r\nAside from ferns and gorgeous Calathea as suggested above, you can mix it up with some other urban jungle plants, like:\r\n\r\nChinese evergreen\r\n\r\nPeace lily\r\n\r\nPhilodendrons\r\n\r\nBamboo\r\n\r\nPLAY AROUND THE WINDOWSILLS – BEST FOR KITCHEN\r\naloe-vera-pilea-best-plants-for-windowsill-kitchen.jpg\r\nEspecially if your kitchen is a kitchenette.\r\n\r\nSome little plants like aloes or cacti and succulent plants are perfect for this game. You can plant them in different sizes of pots and display along your kitchen windowsills.\r\n\r\nBesides, you can make use of some excess space on your trolleys, open shelves, top of your fridge, extra worktop or dishwasher.\r\n\r\n\r\n\r\n\r\nADD ONE BIG STATEMENT OR TWO – BEST FOR LIVING ROOM\r\nDon’t be afraid to try one giant, big-leafed plant. You’ll be amazed by how jungle-ish (but not cluttered) this big statement transforms your living space.\r\n\r\nBut if you’re considering getting an expensive large plant, do your homework before to save you some money. This blog is here to cover your back and answer your indoor plant care questions.\r\n\r\n\r\n\r\n\r\nSome recommended large plants:\r\n\r\nAlocasia\r\n\r\nBanana tree\r\n\r\nPancake plant\r\n\r\nFicus Lyrata\r\n\r\nSwiss cheese plant\r\n\r\nBird of Paradise\r\n\r\n\r\n\r\n\r\n2) URBAN JUNGLE GARDENING: ESSENTIAL TOOLS AND ACCESSORIES\r\nTo start and maintain an urban jungle, here are essential indoor gardening tools and accessories that you will need at some point. \r\n\r\n\r\n\r\nWHAT YOU WILL NEED:\r\nGet both types of potting soil. \r\n\r\nThere are two types of houseplant soils: a well-drained soil rich in sand (for cacti, succulents and the associated dry-type of houseplants), and a moister soil for most other common houseplants, especially the tropical ones. \r\n\r\nWhen you add soil to top-up or repot your plant, check about their preferred type of soil. Also, organic soil is the best for plants and also advised by many experts. \r\n\r\nThe top list in this article is helpful if you have no idea of which brand or which product to go for.\r\n\r\nFertilizer (a.k.a. plant food)\r\n\r\nTrays and saucers (for drainage and in order to easily water from below)\r\n\r\nWatering can\r\n\r\nPots\r\n\r\nSelf-watering pots.\r\n\r\nFor the extra peace of mind, if you have too many plants, or to back you up when you’re away from home, try self-watering plant pots. They are my key partners for the maintenance of the thirsty-type of indoor plants.\r\n\r\n\r\n\r\n\r\nEXTRAS (ALSO GOOD GIFT IDEAS)\r\nGardening gloves\r\n\r\nGravels of different colors for decorative topping\r\n\r\nMini-spade and rake because they’re cute and it makes you look like a pro\r\n\r\nMister spray\r\n\r\n\r\n\r\n\r\nPLANT PROPAGATION ACCESSORIES:\r\nDid you know you can propagate a plant cutting into many babies?! I’ve easily done this with my golden pothos (and also with an avocado seed). Many houseplants are propagation-friendly.\r\n\r\nFor the budget-minded gardeners or if you are thinking of propagating your plants for the fun to watch them grow, you&#39;ll need propagation plates, propagation tubes or even just a glass or a vase. \r\n\r\n\r\n\r\n\r\n3) WHICH FACTORS AFFECT THE CHOICE OF NEW PLANTS?\r\nThese factors have an influence on the choice of your new plants:\r\n\r\nThe levels of humidity and light exposure in your house\r\n\r\nDo you have pets or children?\r\n\r\nThe amount of time you’re at home\r\n\r\nFor example, if the humidity levels in your house are high, plants like ferns and oh-so-gorgeous Calatheas are amazing to grow, as they require high humidity to thrive.\r\n\r\nBut most homes are on the dry side, so hardier species such as large monstera deliciosa, succulents, and cacti for example would be more suitable for beginners. These three require minimal maintenance, and would satisfy plant lovers who are not at home regularly.\r\n\r\nIf you have furry friends or children, stay away from Pothos, Philodendron, and other lush plants as they are toxic to pets. You can check the list of poisonous plants here.', 'home garden', 'how-to-create-a-plant-loving-home.jpg'),
(5, 34, 'advisor sayed', 'PLANTS THAT THRIVE IN THE BATHROOM', 'The key to making the most of your plants’ potential is understanding the bathroom environment and choosing varieties that will thrive in it. It doesn’t matter if your space is ultra-modern or quite traditional, a houseplant or two will always create an impression. Live plants are natural, zen-inducing and can make a great addition to any bathroom. Even better, they can purify the air, create a fresher environment and, in the case of aloe, even contain healing properties. With that in mind, here’s a look at where to start when choosing plants for this challenging space.\r\n\r\n\r\n\r\nBAMBOO\r\nMost bamboo species are native from warm and moist tropical climates. It’s a type of grass with one of the fastest growth in the world. Did you know that you can grow bamboo without soil? A jar filled with small stones and water is sufficient. \r\n\r\n\r\n\r\nUNDERSTANDING THE BATHROOM ENVIRONMENT\r\nThe bathroom is undoubtedly the most humid room in the house and many bathrooms are short on natural light. When someone takes a long, hot shower, for example, the conditions simulate the moisture and heat of a tropical rainforest. This is an environment that certain plants will love. Unfortunately, that doesn’t include succulents and cacti.\r\n\r\nALL PLANTS NEED LIGHT, EVEN IN THE BATHROOM\r\nIf your bathroom doesn’t have a window it will be hard to maintain any plant there on the long-term, unless you use grow lights.\r\n\r\nPLANTS THAT LOVE THE RAINFOREST\r\nWhen you’re shopping for bathroom plants, you should focus on types that flourish in tropical settings. From rainforest flowers such as orchids to steam-absorbing greenery such as philodendrons, there are a lot of beautiful possibilities. Light conditions also figure into the equation. If your bath is low on natural light, you might want to choose a Chinese evergreen, which likes low to medium light levels and enjoys warm, humid spaces, or colorful begonias, which thrive in fluorescent light. English ivy is another low-light possibility — and it also will help purify the air in your bathroom.\r\n\r\n\r\nIf you’re considering the possibilities for plants in your bathroom, the below inforgraphic is a great place to find more information. It details the reasons why plants are beneficial in the bathroom, as well as the types of plants that are good picks for this space. Check it out and get inspired about adding a little greenery and life to your bathroom!\r\n\r\n', 'home garden', 'plants-that-thrive-in-the-bathroom.jpg'),
(6, 35, 'advisor sumon', 'I Overwatered my rubber plant and this is what I learnt.', 'I was about to go on holidays and decided to water my rubber plant (Ficus Elastica) one last time. I&#39;m always careful when I water my rubber plant because I know that it doesn&#39;t tolerate large amounts of water very well.\r\n\r\nAt home, this plant is still potted in its original plastic pot. But it is placed inside a larger decorative ceramic pot (as you can see above) and overlaid with a thick layer of moss. So, the plastic pot is out of reach, and, because of that, I&#39;m forced to water from above, which makes things even more difficult. My preferred watering technique is to water from below instead (soaking it in a tray) because it&#39;s more homogeneous and the plant can absorb just what it wants before I drain excess water away. Back to my story, I didn&#39;t have a choice and watered with the content of one large glass and left for vacation. I guess that it is the technique that&#39;s used by many of you, so I thought that it was worth writing about it. Guess what happened next? When I came back two of the bottom leaves were feeling unwell and turned yellow. One yellow leaf dropped this morning when I moved the plant and the other one will follow soon, sadly. Not sure if I&#39;ll be able to recover this leaf. Let&#39;s analyze what&#39;s happened and learn something:\r\n\r\n\r\n\r\nTHE STEP-BY-STEP OVER-WATERING DRAMA\r\nOlder leaves turning yellow is a sign of over-watering a rubber plant.\r\nOlder leaves turning yellow is a sign of over-watering a rubber plant.\r\n\r\nThe soil was totally dry initially, but the plant was feeling healthy.\r\n\r\nPlanning ahead for the holiday break, I watered from above, too much at once. The water intake wasn&#39;t homogeneous and the excess water didn&#39;t drain properly.\r\n\r\nRoots at the bottom of the pot had to sit in excess water for many days.\r\n\r\nThe plant reacted to this by sacrificing the older leaves at the bottom of the stem, in favor of the new ones (the large leaves that are directly attached to the main stem of the plant are the oldest)\r\n\r\nI probably should have watered less, more evenly, or made sure to drain excess water properly (see the soaking technique which constantly proves to have better results).\r\n\r\nTo fix the problem, I stopped watering her for a longer period of time, cut the dead leaves and let her be. I know she can grow on neglect and that I was being a little over-caring with her. She’s a grown-up, lesson’s learned!\r\n\r\n\r\n\r\nMY TIPS FOR RUBBER PLANT CARE (FICUS ELASTICA)\r\nPrefer watering from below, by soaking the plant in a tray during a couple of hours. In my experience it’s more homogeneous and less prone to over-watering.\r\n\r\nWhen you water it, don&#39;t drench it and make sure that all the water drains well out of the pot. No roots sitting in water, okay?! To do that, I hold my plant up by the plastic pot and wiggle it, to help drain excess water out through the drainage holes. I then leave the plant outside the decorative pot for a couple of hours before I put it back.\r\n\r\nRubber plant is a hardy species that tolerates dry soil quite well, so prefer staying on the under-watering side.\r\n\r\nIf the older leaves (usually the largest ones, at the bottom) are becoming yellow or brown, that&#39;s a sign of overwatering.\r\n\r\nLet it dry out fully during longer periods of time between waterings.\r\n\r\nIf the yellow/brown spots are spreading from the inner part of the leaf and out, that&#39;s again a sign of overwatering.\r\n\r\nOn the contrary, if the plant is under-watered, all the leaves will become softer or droopy, not only the bottom ones.\r\n\r\nIf the air is too dry, the tips will dry out first and the yellow/brown spots will grow inwards.\r\n\r\nWhen the plant is well hydrated, leaves are strong and firm, holding up well, with a nice waxy glow.\r\n\r\n\r\nTHE RIGHT LIGHT\r\nThe rubber plant is one of my favorite Invincible Houseplants because I know it will soon recover from this little mishap. Not a revengeful plant. Generally speaking, it accommodates very well for both bright indirect sunlight and low light, as well as can stand relatively long periods without water.\r\n\r\n\r\nINTERESTING FACTS ABOUT FICUS ELASTICA\r\nThe rubber plant is part of the well-known Ficus (or Fig) family.\r\n\r\nThe rubber plant yields a milky white latex, which was formerly used to produce latex for rubber making. It&#39;s now been replaced by another species, but the Latin name &#39;Elastica&#39; still refers to this time.\r\n\r\nMORE HOUSEPLANT CARE TIPS\r\nHow to grow an avocado plant\r\n\r\nHow to water indoor plants the right way\r\n\r\nEasy-care houseplants', 'flower plant', 'healthy-rubber-plant-ficus-elastica-care-advice-water-light.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(16, 49, 'sayed', 'sayed@gmail.com', '1234', 'i have a problem');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `mssg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`mssg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `date`, `time`) VALUES
(38, 34, 49, 'hello', '27-Jan-2023', '07:29 pm'),
(39, 49, 34, 'hi', '27-Jan-2023', '07:36 pm');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `transaction_id`, `payment_status`) VALUES
(54, 49, 'sayed', '1234', 'sayed@gmail.com', 'BKASH-BKash', 'flat no. shyamoli road 2 dhaka dhaka bangladesh - 1207', ', lily ( 3 )', 375, '27-Jan-2023', 'LIFE_OF_GREEN_63d3d1135f95f', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `season` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `season`, `details`, `price`, `image`) VALUES
(24, 'lily', 'flower', 'winter_season', 'beautiful flower, buy it! ', 125, 'lily.jpg'),
(25, 'Bonsai ', 'bonsai', 'other', 'Bonsai. 7 years old.', 18000, 'cat1.jpg'),
(26, 'Allamanda Flower Plant', 'flower', 'all_season_flower', 'Categories: All Season Flower Plant, Flower Plant', 140, 'Allamanda_Flower_Plant.jpg'),
(27, 'Agar Tree Plant', 'seed', 'other', 'agar tree plant', 180, 'Agar_Tree_Plant.jpg'),
(28, 'Allspice Tree', 'flower', 'all_season_flower', 'Allspice Tree. Gorgeous. ', 130, 'Allspice_Tree.jpg'),
(29, 'Amrapali Indian', 'fruit', 'all_season_fruit', 'amrapali-indian', 300, 'amrapali-indian.jpg'),
(30, 'Apple Tree Plant Malaysian', 'fruit', 'all_season_fruit', 'Apple_Tree_Plant_Malaysian', 800, 'Apple_Tree_Plant_Malaysian.jpg'),
(31, 'Chia Seeds', 'seed', 'other', 'Chia_Seeds. 100gm', 50, 'Chia_Seeds.jpg'),
(32, 'Coriander Seeds', 'seed', 'other', 'Coriander_Seeds', 70, 'Coriander_Seeds.jpg'),
(33, 'Garden Sprayer 2 Liter', 'accessories', '', 'Garden_Sprayer_2_Litre', 200, 'Garden_Sprayer_2_Litre.jpg'),
(34, 'Plastic Tub 10″ With Tray', 'accessories', '', 'Plastic_Tub_10″_With_Tray', 150, 'Plastic_Tub_10&#39;&#39;_With_Tray.jpg'),
(38, 'Thai Sweet Jambura', 'fruit', 'all_season_fruit', 'jambura exported', 125, 'Thai_Sweet_Jambura.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `s_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `amount` int(100) NOT NULL,
  `place_on` varchar(100) NOT NULL,
  `place_upto` varchar(100) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `transaction_no` varchar(50) NOT NULL,
  `payment_status` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`s_id`, `user_id`, `user_name`, `email`, `amount`, `place_on`, `place_upto`, `payment_type`, `transaction_no`, `payment_status`) VALUES
(15, 31, 'sayed', 'sayed@gmail.com', 1, '06-Jan-2023', '13-Jan-2023', 'ABBANKIB-AB Bank', 'LIFE_OF_GREEN_63b84d94c184d', 'completed'),
(16, 41, 'sumon', 'sumon@gmail.com', 1, '06-Jan-2023', '13-Jan-2023', 'DBBLMOBILEB-Dbbl Mobile Banking', 'LIFE_OF_GREEN_63b85e9559248', 'completed'),
(17, 41, 'sumon', 'sumon@gmail.com', 1500, '06-Jan-2023', '06-Jul-2023', 'DBBLMOBILEB-Dbbl Mobile Banking', 'LIFE_OF_GREEN_63b85e9559248', 'completed'),
(18, 45, 'sujon', 'sujon@gmail.com', 1500, '06-Jan-2023', '06-Jul-2023', 'BKASH-BKash', 'LIFE_OF_GREEN_63b87e25aa4a2', 'completed'),
(19, 44, 'test11', 'test11@gmail.com', 5000, '07-Jan-2023', '07-Jan-2024', 'BKASH-BKash', 'LIFE_OF_GREEN_63c15fe6218f0', 'completed'),
(20, 44, 'test11', 'test11@gmail.com', 5000, '13-Jan-2023', '13-Jan-2024', 'BKASH-BKash', 'LIFE_OF_GREEN_63c15fe6218f0', 'completed'),
(21, 49, 'sayed', 'sayed@gmail.com', 1500, '27-Jan-2023', '27-Jul-2023', 'BKASH-BKash', 'LIFE_OF_GREEN_63d3d16cc47d1', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `user_status` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `specialist` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`, `user_status`, `image`, `degree`, `specialist`) VALUES
(32, 'admin1', 'admin1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', '', 'logo.png', '', ''),
(34, 'advisor sayed', 'advisor1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'advisor', '', 'photo_2023-01-27_10-09-03.jpg', 'BSc in Agriculture', 'Floral specialists '),
(35, 'advisor sihab', 'advisor2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'advisor', '', 'myself.jpg', 'BSc in Agriculture', 'Plant Breeding and Genetics'),
(41, 'sumon', 'sumon@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 'subscriber', 'Snapchat-811708880.jpg', '', ''),
(44, 'test11', 'test11@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 'not subscriber', 'pic-6.png', 'null', 'null'),
(45, 'sujon', 'sujon@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 'subscriber', 'pic-3.png', '', ''),
(46, 'advisor sakin', 'sakin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'advisor', '', 'sakin.jpg', 'BSc in Agriculture', 'Horticulture and Agronomy'),
(49, 'sayed', 'sayed@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 'subscriber', 'photo_2023-01-27_10-09-03.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`mssg_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `mssg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `s_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
