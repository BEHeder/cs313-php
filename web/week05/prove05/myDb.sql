CREATE TABLE user
( id           SERIAL      NOT NULL PRIMARY KEY
, username     VARCHAR(50) NOT NUll UNIQUE
, password     VARCHAR(50) NOT NULL
, display_name VARCHAR(50) NOT NULL
, is_public    BOOLEAN     NOT NULL --this will indicate whether other users can see this user's list
);

CREATE TABLE genre
( id   SERIAL      NOT NULL PRIMARY KEY
, name VARCHAR(50) NOT NULL
);

CREATE TABLE game_type
( id   SERIAL      NOT NULL PRIMARY KEY
, name VARCHAR(50) NOT NULL
);

CREATE TABLE game
( id              SERIAL       NOT NULL PRIMARY KEY
, name            VARCHAR(100) NOT NULL
, genre_id        INT          NOT NULL REFERENCES genre(id)
, game_type       INT          NOT NULL REFERENCES game_type(id)
, age_min         INT          NOT NULL CHECK (age_min >= 0)
, len_lower       INT          NOT NULL CHECK (len_lower > 0)          --the lower end of the typical playtime
, len_upper       INT          NOT NULL CHECK (len_upper >= len_lower) --the upper end of the typical playtime
, num_players_min INT          NOT NULL CHECK (num_players_min > 0)
, num_players_max INT          NOT NULL CHECK (num_players_max >= num_players_min)
);

CREATE TABLE wishlist
( id       SERIAL  NOT NULL PRIMARY KEY
, user_id  INT     NOT NULL REFERENCES user(id)
, game_id  INT     NOT NULL REFERENCES game(id)
, is_owned BOOLEAN NOT NULL --this checks whether the user already owns a copy of a certain game
);