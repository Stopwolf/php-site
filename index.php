<!DOCTYPE html>
<html>

<head>
  <title>ITEH App</title>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <main>
    <nav>
      <div class="nav-wrapper blue darken-3">
        <a href="#" class="brand-logo"><i class="material-icons left">school</i> ITEH App</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="sass.html">Obligations</a></li>
          <li><a href="badges.html">Subjects</a></li>
        </ul>
      </div>
    </nav>
    
    <div class="row">
        <div class="col s128 m5">
          <div class="card blue darken-1">
            <div class="card-action white-text">
                <ul>
                    <li><form>
                        <div class="input-field">
                          <input id="search" type="search" required>
                          <label class="label-icon" for="search"><i class="material-icons left">search</i></label>
                          <i class="material-icons">close</i>
                        </div>
                      </form></li>
                    <li class="waves-effect indigo darken-2 btn"><i class="material-icons left">insert_chart</i>Name</li>
                    <li class="waves-effect indigo darken-2 btn"><i class="material-icons left">format_quote</i>Description</li>
                    <li class="waves-effect indigo darken-2 btn"><i class="material-icons left">publish</i>Date</li>
                    <li class="waves-effect indigo darken-2 btn"><i class="material-icons left">attach_file</i>Is Done</li>
                  </ul>
            </div>
          </div>
        </div>
    </div>
    <ul class="gradient-list">
      <li>
        <div class="row">
          <div class="col s12 m6">
            <div class="card blue darken-1">
              <div class="card-content white-text">
                <span class="card-title">Name</span>
                <p>Description: <br></p>
                <p>Date: <br></p>
                <p>Is Done: <br></p>
                <p>Subject: <br></p>
              </div>
              <div class="card-action">
                <a class="waves-effect indigo darken-1 btn"><i class="material-icons left">create</i>Edit</a>
                <a class="waves-effect red darken-1 btn"><i class="material-icons left">delete</i>Delete</a>
              </div>
            </div>
          </div>
        </div>
      </li>
    </ul>
    <a class="waves-effect waves-light btn"><i class="material-icons left">plus_one</i>Add</a>
  </main>
  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>