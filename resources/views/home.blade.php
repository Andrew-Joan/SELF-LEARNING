@extends('layouts.main')

@section('container')
    <div class="slider-container">
        <div id="slider">
            <figure>
                <img src="{{ asset('assets/SliderImage/slider-img-1.png') }}" alt="Gambar Slider 1">
                <img src="{{ asset('assets/SliderImage/slider-img-2.png') }}" alt="Gambar Slider 2">
                <img src="{{ asset('assets/SliderImage/slider-img-3.png') }}" alt="Gambar Slider 3">
                <img src="{{ asset('assets/SliderImage/slider-img-4.png') }}" alt="Gambar Slider 4">
                <img src="{{ asset('assets/SliderImage/slider-img-5.png') }}" alt="Gambar Slider 5">
            </figure>
        </div>
    </div>

    <div class="container-22">
        <div class="latest-comic-container">
            <div class="latest-headline">
                # Latest Update
            </div>
            {{-- <div class="row g-2 my-2">
                <div class="col w-150px">
                    <div class="comic-image-container">
                        <a href="../Comic Website/Single-Comic-Website/Nano Machine.html">
                            <img src="{{ asset('assets/ComicImage/Nano machine.jpg') }}" alt="Gambar Slider 1">
                        </a>
                    </div>
                    <div class="comic-name">
                        <a href="../Comic Website/Single-Comic-Website/Nano Machine.html">
                        Nano Machine
                        </a>
                    </div>
                    <div class="chapter-stats-container-1">
                        <div class="chapter-number">
                        Chapter 106
                        </div>
                        <div class="released-time">
                        14 hours
                        </div>
                    </div>
                
                    <div class="chapter-stats-container-2">
                        <div class="chapter-number">
                        Chapter 105
                        </div>
                        <div class="released-time">
                        14 hours
                        </div>
                    </div>
                </div>
        
                <div class="col">
                    <div class="comic-image-container">
                        <a href="../Comic Website/Single-Comic-Website/Return of the Mount Hua Sect.html">
                        <img class="comic-image" src="../Comic Website/Comic-thumbnail/Return of the mount hua sect.webp">
                        </a>
                    </div>
                    <div class="comic-name">
                        <a href="../Comic Website/Single-Comic-Website/Return of the Mount Hua Sect.html">
                        Return Of the Mount Hua Sect
                        </a>
                    </div>
                    <div class="chapter-stats-container-1">
                        <div class="chapter-number">
                        Chapter 64
                        </div>
                        <div class="released-time">
                        14 hours
                        </div>
                    </div>
                
                    <div class="chapter-stats-container-2">
                        <div class="chapter-number">
                        Chapter 63
                        </div>
                        <div class="released-time">
                        May 17
                        </div>
                    </div>
                </div>
            
                <div class="col">
                    <div class="comic-image-container">
                        <a href="../Comic Website/Single-Comic-Website/How to Live As a Villain.html">
                        <img class="comic-image" src="../Comic Website/Comic-thumbnail/How to live as a villain.webp">
                        </a>
                    </div>
                    <div class="comic-name">
                        <a href="../Comic Website/Single-Comic-Website/How to Live As a Villain.html">
                        How to Live As a Villain
                        </a>
                    </div>
                    <div class="chapter-stats-container-1">
                        <div class="chapter-number">
                        Chapter 45
                        </div>
                        <div class="released-time">
                        15 hours
                        </div>
                    </div>
                
                    <div class="chapter-stats-container-2">
                        <div class="chapter-number">
                        Chapter 44
                        </div>
                        <div class="released-time">
                        May 17
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="comic-image-container">
                        <a href="../Comic Website/Single-Comic-Website/How to Live As a Villain.html">
                        <img class="comic-image" src="../Comic Website/Comic-thumbnail/How to live as a villain.webp">
                        </a>
                    </div>
                    <div class="comic-name">
                        <a href="../Comic Website/Single-Comic-Website/How to Live As a Villain.html">
                        How to Live As a Villain
                        </a>
                    </div>
                    <div class="chapter-stats-container-1">
                        <div class="chapter-number">
                        Chapter 45
                        </div>
                        <div class="released-time">
                        15 hours
                        </div>
                    </div>
                
                    <div class="chapter-stats-container-2">
                        <div class="chapter-number">
                        Chapter 44
                        </div>
                        <div class="released-time">
                        May 17
                        </div>
                    </div>
                </div>
        
                <div class="col">
                    <div class="comic-image-container">
                        <a href="../Comic Website/Single-Comic-Website/Barbarian Quest.html">
                        <img class="comic-image" src="../Comic Website/Comic-thumbnail/Barbarian quest.png">
                        </a>
                    </div>
                    <div class="comic-name">
                        <a href="../Comic Website/Single-Comic-Website/Barbarian Quest.html">
                        Barbarian Quest
                        </a>
                    </div>
                    <div class="chapter-stats-container-1">
                        <div class="chapter-number">
                        Chapter 26
                        </div>
                        <div class="released-time">
                        15 hours
                        </div>
                    </div>
                
                    <div class="chapter-stats-container-2">
                        <div class="chapter-number">
                        Chapter 25
                        </div>
                        <div class="released-time">
                        May 17
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="comic-main-container">
                <div class="comic-container">
                <div class="comic-image-container">
                    <img class="comic-image" src="../Comic Website/Comic-thumbnail/The hero return.jpeg">
                </div>
                <div class="comic-name">
                    The Hero Returns
                </div>
                <div class="chapter-stats-container-1">
                    <div class="chapter-number">
                    Chapter 31.5
                    </div>
                    <div class="released-time">
                    16 hours
                    </div>
                </div>
            
                <div class="chapter-stats-container-2">
                    <div class="chapter-number">
                    Chapter 31
                    </div>
                    <div class="released-time">
                    May 17
                    </div>
                </div>
                </div>
        
                <div class="comic-container">
                <div class="comic-image-container">
                    <img class="comic-image" src="../Comic Website/Comic-thumbnail/The world after the fall.jpg">
                </div>
                <div class="comic-name">
                    The World After the Fall
                </div>
                <div class="chapter-stats-container-1">
                    <div class="chapter-number">
                    Chapter 23
                    </div>
                    <div class="released-time">
                    19 hours
                    </div>
                </div>
            
                <div class="chapter-stats-container-2">
                    <div class="chapter-number">
                    Chapter 22
                    </div>
                    <div class="released-time">
                    20 hours
                    </div>
                </div>
                </div>
        
                <div class="comic-container">
                <div class="comic-image-container">
                    <img class="comic-image" src="../Comic Website/Comic-thumbnail/Return of the shattered constellation.webp">
                </div>
                <div class="comic-name">
                    Return Of the Broken Constellation
                </div>
                <div class="chapter-stats-container-1">
                    <div class="chapter-number">
                    Chapter 35
                    </div>
                    <div class="released-time">
                    20 hours
                    </div>
                </div>
            
                <div class="chapter-stats-container-2">
                    <div class="chapter-number">
                    Chapter 34
                    </div>
                    <div class="released-time">
                    May 18
                    </div>
                </div>
                </div>
        
                <div class="comic-container">
                <div class="comic-image-container">
                    <img class="comic-image" src="../Comic Website/Comic-thumbnail/Reincarnation of the suicidal battle god.webp">
                </div>
                <div class="comic-name">
                    Reincarnation Of the Suicidal Battle God
                </div>
                <div class="chapter-stats-container-1">
                    <div class="chapter-number">
                    Chapter 50
                    </div>
                    <div class="released-time">
                    21 hours
                    </div>
                </div>
            
                <div class="chapter-stats-container-2">
                    <div class="chapter-number">
                    Chapter 49
                    </div>
                    <div class="released-time">
                    May 18
                    </div>
                </div>
                </div>
            </div>
        
            <div class="comic-main-container">
                <div class="comic-container">
                <div class="comic-image-container">
                    <img class="comic-image" src="../Comic Website/Comic-thumbnail/Level 1 player.jpg">
                </div>
                <div class="comic-name">
                    Level One Player
                </div>
                <div class="chapter-stats-container-1">
                    <div class="chapter-number">
                    Chapter 38
                    </div>
                    <div class="released-time">
                    21 hours
                    </div>
                </div>
            
                <div class="chapter-stats-container-2">
                    <div class="chapter-number">
                    Chapter 37
                    </div>
                    <div class="released-time">
                    May 18
                    </div>
                </div>
                </div>
        
                <div class="comic-container">
                <div class="comic-image-container">
                    <img class="comic-image" src="../Comic Website/Comic-thumbnail/Swordmaster's youngest son.png">
                </div>
                <div class="comic-name">
                    Swordmaster's Youngest Son
                </div>
                <div class="chapter-stats-container-1">
                    <div class="chapter-number">
                    Chapter 21
                    </div>
                    <div class="released-time">
                    22 hours
                    </div>
                </div>
            
                <div class="chapter-stats-container-2">
                    <div class="chapter-number">
                    Chapter 20
                    </div>
                    <div class="released-time">
                    May
                    </div>
                </div>
                </div>
        
                <div class="comic-container">
                <div class="comic-image-container">
                    <a href="../Comic Website/Single-Comic-Website/Quest Supremacy.html"><img class="comic-image" src="../Comic Website/Comic-thumbnail/Quest supremacy.png"></a>
                </div>
                <div class="comic-name"><a href="../Comic Website/Single-Comic-Website/Quest Supremacy.html">            
                    Quest Supremacy
                </a>
                </div>
                <div class="chapter-stats-container-1">
                    <div class="chapter-number">
                    Chapter 32
                    </div>
                    <div class="released-time">
                    22 hours
                    </div>
                </div>
            
                <div class="chapter-stats-container-2">
                    <div class="chapter-number">
                    Chapter 31
                    </div>
                    <div class="released-time">
                    May 18
                    </div>
                </div>
                </div>
        
                <div class="comic-container">
                <div class="comic-image-container">
                    <a href="../Comic Website/Single-Comic-Website/Return of The Legendary Spear Knight.html"><img class="comic-image" src="../Comic Website/Comic-thumbnail/Return of the legendary spear knight.jpeg"></a>
                </div>
                <div class="comic-name"><a href="../Comic Website/Single-Comic-Website/Return of The Legendary Spear Knight.html">
                    Return Of the Legendary Spear...
                </a> </div>
                <div class="chapter-stats-container-1">
                    <div class="chapter-number">
                    Chapter 45
                    </div>
                    <div class="released-time">
                    23 hours
                    </div>
                </div>
            
                <div class="chapter-stats-container-2">
                    <div class="chapter-number">
                    Chapter 44
                    </div>
                    <div class="released-time">
                    May 19
                    </div>
                </div>
                </div>
            </div>
        
            <div class="comic-main-container">
                <div class="comic-container">
                <div class="comic-image-container">
                    <img class="comic-image" src="../Comic Website/Comic-thumbnail/Return of the disaster class hero.jpg">
                </div>
                <div class="comic-name">
                    Return Of the Disaster-Class Hero
                </div>
                <div class="chapter-stats-container-1">
                    <div class="chapter-number">
                    Chapter 37.5
                    </div>
                    <div class="released-time">
                    23 hours
                    </div>
                </div>
            
                <div class="chapter-stats-container-2">
                    <div class="chapter-number">
                    Chapter 37
                    </div>
                    <div class="released-time">
                    May 19
                    </div>
                </div>
                </div>
        
                <div class="comic-container">
                <div class="comic-image-container">
                    <img class="comic-image" src="../Comic Website/Comic-thumbnail/The live.webp">
                </div>
                <div class="comic-name">
                    The Live
                </div>
                <div class="chapter-stats-container-1">
                    <div class="chapter-number">
                    Chapter 100
                    </div>
                    <div class="released-time">
                    23 hours
                    </div>
                </div>
            
                <div class="chapter-stats-container-2">
                    <div class="chapter-number">
                    Chapter 99
                    </div>
                    <div class="released-time">
                    May 19
                    </div>
                </div>
                </div>
        
                <div class="comic-container">
                <div class="comic-image-container">
                    <img class="comic-image" src="../Comic Website/Comic-thumbnail/The return of the crazy demon.webp">
                </div>
                <div class="comic-name">
                    The Return Of the Crazy Demon
                </div>
                <div class="chapter-stats-container-1">
                    <div class="chapter-number">
                    Chapter 48
                    </div>
                    <div class="released-time">
                    May 23
                    </div>
                </div>
            
                <div class="chapter-stats-container-2">
                    <div class="chapter-number">
                    Chapter 47
                    </div>
                    <div class="released-time">
                    May 20
                    </div>
                </div>
                </div>
        
                <div class="comic-container">
                <div class="comic-image-container">
                    <img class="comic-image" src="../Comic Website/Comic-thumbnail/Volcanic age.png">
                </div>
                <div class="comic-name">
                    Volcanic Age
                </div>
                <div class="chapter-stats-container-1">
                    <div class="chapter-number">
                    Chapter 205
                    </div>
                    <div class="released-time">
                    May 23
                    </div>
                </div>
            
                <div class="chapter-stats-container-2">
                    <div class="chapter-number">
                    Chapter 204
                    </div>
                    <div class="released-time">
                    May 23
                    </div>
                </div>
                </div>
            </div> --}}

            <div class="row">
                <div class="col">
                    <img src="{{ asset('assets/ComicImage/Nano machine.jpg') }}" alt="Gambar Slider 1">
                    <div class="comic-name">Nano Machine</div>
                    <div class="chapter-stats-container">
                        <div class="chapter-stats mb-2">
                            <div class="chapter-number">Chapter 100</div>
                            <div class="released-time">14 hours</div>
                        </div>
                        <div class="chapter-stats mb-2">
                            <div class="chapter-number">Chapter 99</div>
                            <div class="released-time">29 May</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="latest-load-more">
                <button class="latest-button-load-more">Load More &#x25BE;</button>
            </div>
        </div>
        
        <div class="right-container">
            <div class="support-container">
                <div class="support-headline">
                    # Support Us
                </div>
                <div class="support-image">
                <a href="https://www.instagram.com/andrew_yello/">
                    <img src="{{ asset('assets/SupportImage/Instagram.jpg') }}" alt="Gambar Instagram" class="ig-image">
                </a>
                </div>
                <div class="support-image">
                    <img src="{{ asset('assets/SupportImage/Discord.png') }}" alt="Gambar Dicord" class="dc-image">
                </div>
                <div class="support-image">
                    <img src="{{ asset('assets/SupportImage/Paypal.webp') }}" alt="Gambar Paypal" class="paypal-image">
                </div>
            </div>

            <div class="trending-container">
                <div class="trending-headline">
                    # Trending
                </div>
                <div class="trending-duration-container">
                    <div class="trending-duration">
                        <div class="trending-weekly">
                        Weekly
                        </div>
                        <div class="trending-monthly">
                        Monthly
                        </div>
                        <div class="trending-alltime">
                        All Time
                        </div>
                    </div>
                </div>

                <div class="all-10-trending-comic-container">
                    <div class="trending-comic-container">
                        <div class="trending-comic-number-cover">
                        <div class="trending-comic-number">
                            1
                        </div>
                        <div class="trending-comic-cover-container">
                            <img class="trending-comic-cover" src="../Comic Website/Comic-thumbnail/Volcanic age.png">
                        </div>
                        </div>
                        <div class="trending-comic-stats">
                        <div class="trending-comic-name">
                            Volcanic Age
                        </div>
                        <div class="star-rating-container">
                            <div class="star-wrapper">
                            <img class= "star-1" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-2" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-3" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-4" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-5" src="https://assets.codepen.io/13090/filled_1.svg">
                            </div>
                            <div class="rating-number">
                            4.9
                            </div>
                        </div>
                        <div class="trending-genres">
                            Genres:
                            <span class="trending-comic-genres">Action, Adventure, Fantasy, Time-travel</span>
                        </div>
                        </div>
                    </div>
        
                    <div class="trending-comic-container">
                        <div class="trending-comic-number-cover">
                        <div class="trending-comic-number">
                            2
                        </div>
                        <div class="trending-comic-cover-container">
                            <img class="trending-comic-cover" src="../Comic Website/Comic-thumbnail/Reincarnation of the suicidal battle god.webp">
                        </div>
                        </div>
                        <div class="trending-comic-stats">
                        <div class="trending-comic-name">
                            Reincarnation Of the Suicidal Battle God
                        </div>
                        <div class="star-rating-container">
                            <div class="star-wrapper">
                            <img class= "star-1" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-2" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-3" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-4" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-5" src="https://assets.codepen.io/13090/filled_1.svg">
                            </div>
                            <div class="rating-number">
                            5
                            </div>
                        </div>
                        <div class="trending-genres">
                            Genres:
                            <span class="trending-comic-genres">Action, Adventure, Fantasy, Time-travel</span>
                        </div>
                        </div>
                    </div>

                    <div class="trending-comic-container">
                        <div class="trending-comic-number-cover">
                        <div class="trending-comic-number">
                            3
                        </div>
                        <div class="trending-comic-cover-container">
                            <img class="trending-comic-cover" src="../Comic Website/Comic-thumbnail/Return of the disaster class hero.jpg">
                        </div>
                        </div>
                        <div class="trending-comic-stats">
                        <div class="trending-comic-name">
                            Return Of the Disaster Class Hero
                        </div>
                        <div class="star-rating-container">
                            <div class="star-wrapper">
                            <img class= "star-1" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-2" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-3" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-4" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-5" src="https://assets.codepen.io/13090/filled_1.svg">
                            </div>
                            <div class="rating-number">
                            5
                            </div>
                        </div>
                        <div class="trending-genres">
                            Genres:
                            <span class="trending-comic-genres">Action, Comedy, Fantasy</span>
                        </div>
                        </div>
                    </div>

                    <div class="trending-comic-container">
                        <div class="trending-comic-number-cover">
                        <div class="trending-comic-number">
                            4
                        </div>
                        <div class="trending-comic-cover-container">
                            <img class="trending-comic-cover" src="../Comic Website/Comic-thumbnail/The hero return.jpeg">
                        </div>
                        </div>
                        <div class="trending-comic-stats">
                        <div class="trending-comic-name">
                            The Hero Returns
                        </div>
                        <div class="star-rating-container">
                            <div class="star-wrapper">
                            <img class= "star-1" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-2" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-3" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-4" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-5" src="https://assets.codepen.io/13090/filled_1.svg">
                            </div>
                            <div class="rating-number">
                            4.8
                            </div>
                        </div>
                        <div class="trending-genres">
                            Genres:
                            <span class="trending-comic-genres">Action, Adventure, Drama, Fantasy, Time-travel</span>
                        </div>
                        </div>
                    </div>

                    <div class="trending-comic-container">
                        <div class="trending-comic-number-cover">
                        <div class="trending-comic-number">
                            5
                        </div>
                        <div class="trending-comic-cover-container">
                            <a href="../Comic Website/Single-Comic-Website/Return of the Mount Hua Sect.html">
                            <img class="trending-comic-cover" src="../Comic Website/Comic-thumbnail/Return of the mount hua sect.webp">
                            </a>
                        </div>
                        </div>
                        <div class="trending-comic-stats">
                        <div class="trending-comic-name">
                            <a href="../Comic Website/Single-Comic-Website/Return of the Mount Hua Sect.html">
                            Return Of the Mount Hua Sect
                            </a>
                        </div>
                        <div class="star-rating-container">
                            <div class="star-wrapper">
                            <img class= "star-1" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-2" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-3" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-4" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-5" src="https://assets.codepen.io/13090/filled_1.svg">
                            </div>
                            <div class="rating-number">
                            4.9
                            </div>
                        </div>
                        <div class="trending-genres">
                            Genres:
                            <span class="trending-comic-genres">Action, Adventure, Comedy, Fantasy, Time-travel</span>
                        </div>
                        </div>
                    </div>

                    <div class="trending-comic-container">
                        <div class="trending-comic-number-cover">
                        <div class="trending-comic-number">
                            6
                        </div>
                        <div class="trending-comic-cover-container">
                            <a href="../Comic Website/Single-Comic-Website/Nano Machine.html">
                            <img class="trending-comic-cover" src="../Comic Website/Comic-thumbnail/Nano machine.jpg">
                            </a>
                        </div>
                        </div>
                        <div class="trending-comic-stats">
                        <div class="trending-comic-name">              
                            <a href="../Comic Website/Single-Comic-Website/Nano Machine.html">
                            Nano Machine
                            </a>
                        </div>
                        <div class="star-rating-container">
                            <div class="star-wrapper">
                            <img class= "star-1" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-2" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-3" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-4" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-5" src="https://assets.codepen.io/13090/filled_1.svg">
                            </div>
                            <div class="rating-number">
                            5
                            </div>
                        </div>
                        <div class="trending-genres">
                            Genres:
                            <span class="trending-comic-genres">Action, Adventure, Fantasy, Sci-Fi</span>
                        </div>
                        </div>
                    </div>

                    <div class="trending-comic-container">
                        <div class="trending-comic-number-cover">
                        <div class="trending-comic-number">
                            7
                        </div>
                        <div class="trending-comic-cover-container">
                            <img class="trending-comic-cover" src="../Comic Website/Comic-thumbnail/Level 1 player.jpg">
                        </div>
                        </div>
                        <div class="trending-comic-stats">
                        <div class="trending-comic-name">
                            Level One Player
                        </div>
                        <div class="star-rating-container">
                            <div class="star-wrapper">
                            <img class= "star-1" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-2" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-3" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-4" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-5" src="https://assets.codepen.io/13090/filled_1.svg">
                            </div>
                            <div class="rating-number">
                            4.9
                            </div>
                        </div>
                        <div class="trending-genres">
                            Genres:
                            <span class="trending-comic-genres">Action, Adventure, Fantasy, Shounen</span>
                        </div>
                        </div>
                    </div>

                    <div class="trending-comic-container">
                        <div class="trending-comic-number-cover">
                        <div class="trending-comic-number">
                            8
                        </div>
                        <div class="trending-comic-cover-container">
                            <a href="../Comic Website/Single-Comic-Website/Return of The Legendary Spear Knight.html">
                            <img class="trending-comic-cover" src="../Comic Website/Comic-thumbnail/Return of the legendary spear knight.jpeg">
                            </a>
                        </div>
                        </div>
                        <div class="trending-comic-stats">
                        <div class="trending-comic-name">
                            <a href="../Comic Website/Single-Comic-Website/Return of The Legendary Spear Knight.html">
                            Return Of the Legendary Spear Knight
                            </a>
                        </div>
                        <div class="star-rating-container">
                            <div class="star-wrapper">
                            <img class= "star-1" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-2" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-3" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-4" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-5" src="https://assets.codepen.io/13090/filled_1.svg">
                            </div>
                            <div class="rating-number">
                            4.8
                            </div>
                        </div>
                        <div class="trending-genres">
                            Genres:
                            <span class="trending-comic-genres">Action, Adventure, Fantasy, Time-travel</span>
                        </div>
                        </div>
                    </div>

                    <div class="trending-comic-container">
                        <div class="trending-comic-number-cover">
                        <div class="trending-comic-number">
                            9
                        </div>

                        <div class="trending-comic-cover-container">
                            <img class="trending-comic-cover" src="../Comic Website/Comic-thumbnail/The world after the fall.jpg">
                        </div>
                        </div>

                        <div class="trending-comic-stats">
                        <div class="trending-comic-name">
                            The World After the Fall
                        </div>
                        <div class="star-rating-container">
                            <div class="star-wrapper">
                            <img class= "star-1" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-2" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-3" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-4" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-5" src="https://assets.codepen.io/13090/filled_1.svg">
                            </div>
                            <div class="rating-number">
                            5
                            </div>
                        </div>
                        <div class="trending-genres">
                            Genres:
                            <span class="trending-comic-genres">Action, Adventure, Drama, Fantasy, Mystery</span>
                        </div>
                        </div>
                    </div>

                    <div class="trending-comic-container-10">
                        <div class="trending-comic-number-cover">
                        <div class="trending-comic-number">
                            10
                        </div>
                        <div class="trending-comic-cover-container">
                            <img class="trending-comic-cover" src="../Comic Website/Comic-thumbnail/Return of the shattered constellation.webp">
                        </div>
                        </div>

                        <div class="trending-comic-stats">
                        <div class="trending-comic-name">
                            Return Of the Broken Constellation
                        </div>
                        <div class="star-rating-container">
                            <div class="star-wrapper">
                            <img class= "star-1" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-2" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-3" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-4" src="https://assets.codepen.io/13090/filled_1.svg">
                            <img class= "star-5" src="https://assets.codepen.io/13090/filled_1.svg">
                            </div>
                            <div class="rating-number">
                            4.8
                            </div>
                        </div>
                        <div class="trending-genres">
                            Genres:
                            <span class="trending-comic-genres">Action, Adventure, Comedy, Fantasy, Shounen</span>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="footer-headline">
        Kraken Scans
        </div>

        <div class="footer-text">
        The use of the manga and other promotional materials are allowed under the fair use clause of the Copyright Law
        and copyrights and trademarks are held by their respective owners
        </div>

        <ul class="socials">
        <li><a href="#" class="fa fa-facebook"></a></li>
        <li><a href="#" class="fa fa-twitter"></a></li>
        <li><a href="#" class="fa fa-google-plus"></a></li>
        <li><a href="#" class="fa fa-instagram"></a></li>
        <li><a href="#" class="fa fa-paypal"></a></li>
        </ul>

        <div class="footer-copyright">
        Copyright© 2022 Krakenscans. designed by Kraken
        </div>
    </div>
@endsection