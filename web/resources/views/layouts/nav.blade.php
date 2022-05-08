<div class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

                @if(\Illuminate\Support\Facades\Auth::user())
                <li class="nav-item">
                    <a href="ajax/logout" class="btn btn-primary my-2 my-sm-0"
                       data-target="#loginModal">Log out, {{ \Illuminate\Support\Facades\Auth::user()->personaname }}
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <button type="button" class="btn btn-success my-2 my-sm-0" type="submit" data-toggle="modal"
                            data-target="#loginModal">Log IN
                    </button>
                </li>
                <li class="nav-item">
                    <a href="/registration" class="btn btn-primary my-2 my-sm-0"
                       data-target="#loginModal">Registration
                    </a>
                </li>
                @endif
            <li class="nav-item">
                @if(\Illuminate\Support\Facades\Auth::user())
                    <button type="button" class="btn btn-success my-2 my-sm-0" type="submit" data-toggle="modal"
                            data-target="#addModal">Add balance
                    </button>
                @endif
            </li>
            <li class="nav-item">
                @if(\Illuminate\Support\Facades\Auth::user())
                    <a href="" role="button">
                        Likes: {{ Auth::user()->likes_balance }}
                    </a>
                @endif
            </li>
        </div>
        <!--      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">-->
        <!--        <li class="nav-item">-->
        <!--            --><?// if (User_model::is_logged()) {?>
    <!--              <button type="button" class="btn btn-primary my-2 my-sm-0" type="submit" data-toggle="modal"-->
        <!--                      data-target="#loginModal">Log in-->
        <!--              </button>-->
        <!--            --><?// } else {?>
    <!--              <button type="button" class="btn btn-danger my-2 my-sm-0" href="/logout">Log out-->
        <!--              </button>-->
        <!--            --><?// } ?>
    <!--        </li>-->
        <!--        <li class="nav-item">-->
        <!--          <button type="button" class="btn btn-success my-2 my-sm-0" type="submit" data-toggle="modal"-->
        <!--                  data-target="#addModal">Add balance-->
        <!--          </button>-->
        <!--        </li>-->
        <!--      </div>-->
    </nav>
</div>
