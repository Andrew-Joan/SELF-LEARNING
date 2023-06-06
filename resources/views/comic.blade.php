@extends('layouts.single-comic')

@section('container')
<div class="background">
    <div class="comic-info">
      <div class="single-comic-name">Nano Machine</div>
      <div class="single-comic-container">
        <div class="single-comic-img-container">
            <img src="{{ asset('assets/ComicImage/Nano machine.jpg') }}" alt="Thumbnail Komik">
        </div>
        <div class="single-comic-stat">
          <div class="star-related">
            <div>
              <img class= "stars" src="https://assets.codepen.io/13090/filled_1.svg">
              <img class= "stars" src="https://assets.codepen.io/13090/filled_1.svg">
              <img class= "stars" src="https://assets.codepen.io/13090/filled_1.svg">
              <img class= "stars" src="https://assets.codepen.io/13090/filled_1.svg">
              <img class= "stars" src="https://assets.codepen.io/13090/filled_1.svg">
            </div>
            <div class="star-value">5</div>
          </div>
          <div class="indicator-background-container">
              <div class="indicator-background-1">
                <div class="indicator">Rating</div>
                <div class="indicator">Rank</div>
                <div class="indicator">Alternative</div>
                <div class="indicator">Author(s)</div>
                <div class="indicator">Genre(s)</div>
                <div class="indicator">Type</div>
              </div>
    
              <div class="indicator-background-2">
                <div class="indicator-2">5 / 5 out of 158</div>
                <div class="indicator-2">6nd, it has 1.9M views</div>
                <div class="indicator-2">Nano Mashin</div>
                <div class="indicator-2">Jeolmu Hyeon</div>
                <div class="indicator-2">Action, Adventure, Fantasy, Sci-fi</div>
                <div class="indicator-2">Manhwa</div>
              </div>
  
              <div class="indicator-34">
                <div class="indicator-34-flex-1">
                  <div class="indicator-background-3">
                    <div class="indicator-3">
                      <div class="single-comic-release">
                        Release
                      </div>
                      <div class="single-comic-status">
                        Status
                      </div>
                    </div>
                  </div>
        
                  <div class="indicator-background-4">
                    <div class="indicator-4">
                      <div class="single-comic-release-year">
                        2020
                      </div>
                      <div class="single-comic-status-rn">
                        OnGoing
                      </div>
                    </div>
                  </div>
                </div>
                <div class="indicator-34-flex-2">
                  <ul class="socials-comic">
                    <li><a href="#" class="fa fa-comments"></a></li>
                    <li class="bookmark-symbol"><a href="#" class="fa fa-bookmark"></a></li>
                  </ul>
                </div>
                <div class="comment-bookmark-count">
                  <div class="count-s1">
                    97 comments
                  </div>
                  <div class="count-s2">
                    976K users bookmarked This
                  </div>
                </div> 
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="synopsis-chapter-container">
      <div class="latest-synopsis">
        # Synopsis
      </div>
      <div class="synopsis-text">
        After being held in disdain and having his life put in danger, an orphan from the Demonic Cult, Cheon Yeo-Woon,
        has an unexpected visit from his descendant from the future who inserts a nano machine into Cheon Yeo-Woon's body, which drastically changes Cheon Yeo-Woon's life after its activation.    
      </div>
      <div class="synopsis-show-more">
        <button class="synopsis-button-show-more">Show More &#x25BE;</button>
      </div>

      <div class="latest-chapter-update">
        # Latest Chapter Update
      </div>

      <div class="first-last-chapter-button-container">
        <div class="first-last-chapter-container">
          <button class="first-last-button">
            <div class="upper-text-button">
              Read First
            </div>
            <div class="lower-text-button">
              Chapter 1
            </div>
          </button>
        </div>

        <div class="first-last-chapter-container">
          <button class="first-last-button">
            <div class="upper-text-button">
              Read Last
            </div>
            <div class="lower-text-button">
              Chapter 106
            </div>
          </button>
        </div>
      </div>

      <div class="chapter-container">
        <div class="chapter-number-container">
          <div class="chap-number">
              Chapter 106
          </div>
          <div class="chap-release-date">
            14 hours ago
          </div>
        </div>
  
        <div class="chapter-number-container">
          <div class="chap-number">
              Chapter 105
          </div>
          <div class="chap-release-date">
            14 hours ago
          </div>
        </div>
  
        <div class="chapter-number-container">
          <div class="chap-number">
              Chapter 104
          </div>
          <div class="chap-release-date">
            May 17, 2022
          </div>
        </div>
  
        <div class="chapter-number-container">
          <div class="chap-number">
              Chapter 103
          </div>
          <div class="chap-release-date">
            May 10, 2022
          </div>
        </div>
  
        <div class="chapter-number-container">
          <div class="chap-number">
              Chapter 102
          </div>
          <div class="chap-release-date">
            May 3, 2022
          </div>
        </div>
  
        <div class="chapter-number-container">
          <div class="chap-number">
              Chapter 101
          </div>
          <div class="chap-release-date">
            April 27, 2022
          </div>
        </div>
        
        <div class="chapter-number-container">
          <div class="chap-number">
              Chapter 100
          </div>
          <div class="chap-release-date">
            April 20, 2022
          </div>
        </div>
  
        <div class="chapter-number-container">
          <div class="chap-number">
              Chapter 99
          </div>
          <div class="chap-release-date">
            April 13, 2022
          </div>
        </div>
      </div>
      <div class="synopsis-show-more">
        <button class="synopsis-button-show-more">Show More &#x25BE;</button>
      </div>

      <div class="discussion-headline">
        # Discussion
      </div>

      <div class="discussion-instruction">
        Leave a Reply
      </div>

      <div class="user-log">
        <span  class="user-log-span">
          Logged in as KrakenScans.
        </span> <span class="user-log-span">Log out?</span> 
      </div>

      <div class="user-img-text">
        <img class="user-img" src="../../Comic Website/logo/Kraken logo">
        <textarea cols=100% rows="5.5" placeholder="Join the discussion"></textarea>
      </div>

      <div class="post-comment-container">
        <button class="post-comment-button">
          Post Comment
        </button>
      </div>

      <div class="total-comment">
        97 Comments
      </div>
      <div class="user-comment">
        <img class="user-img" src="../../Channel-profile/exercise 10e.jpg">
        <div class="user-name-comment">
          <div class="user-name">
            Cute Cat <span>&bull; 2 hours ago</span>
          </div>
          <div class="user-comment-text">
            Thank you for the translation :)
          </div>
        </div>
      </div>

      <div class="user-comment">
        <img class="user-img" src="../../Channel-profile/Exercise 12f-2.jpg">
        <div class="user-name-comment">
          <div class="user-name">
            Sad Cat <span>&bull; 4 hours ago</span>
          </div>
          <div class="user-comment-text">
            I feel so sad today, but this update made my day a lot better, keep up the good work!
          </div>
        </div>
      </div>

      <div class="synopsis-show-more">
        <button class="synopsis-button-show-more">Older Comments &#x25BE;</button>
      </div>
    </div>

    <div class="right-container-single">
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