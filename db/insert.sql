\echo 'INSERTING INTO game_user';
INSERT INTO game_user (username, password, display_name, is_public)
    VALUES ('johndoe', '$2y$10$51IkRkkUAfzEeEl76ehWAeD50UlgryDqUpZNRX7XS9oSI8kuYX1i2', 'John Doe', true);
INSERT INTO game_user (username, password, display_name, is_public)
    VALUES ('janedoe', '$2y$10$O42LKcU7/uoRvQG6On9lBOccEokUn7AO4qrz4Q3Tf62C7a7.lQAL6', 'Jane Doe', true);
INSERT INTO game_user (username, password, display_name, is_public)
    VALUES ('jerrydoe', '$2y$10$6WzVuMgeAz6UhfQsNLnuM.mfjnfKuSNag/jqNkicNm15Seyd8exra', 'Jerry Doe', false);

\echo 'INSERTING INTO genre';
INSERT INTO genre (name) VALUES ('Strategy');
INSERT INTO genre (name) VALUES ('Educational');
INSERT INTO genre (name) VALUES ('Luck');
INSERT INTO genre (name) VALUES ('Family');

\echo 'INSERTING INTO game_type';
INSERT INTO game_type (name) VALUES ('Card Game');
INSERT INTO game_type (name) VALUES ('Board Game');
INSERT INTO game_type (name) VALUES ('Dice Game');

\echo 'INSERTING INTO game';
INSERT INTO game ( name, genre_id, game_type, age_min, len_lower
                 , len_upper, num_players_min, num_players_max)
    VALUES ('Catan', 1, 2, 10, 60, 120, 3, 4);
INSERT INTO game ( name, genre_id, game_type, age_min, len_lower
                 , len_upper, num_players_min, num_players_max)
    VALUES ('Qwirkle', 1, 2, 6, 30, 60, 2, 4);
INSERT INTO game ( name, genre_id, game_type, age_min, len_lower
                 , len_upper, num_players_min, num_players_max)
    VALUES ('Yahtzee', 3, 3, 6, 30, 30, 2, 10);
INSERT INTO game ( name, genre_id, game_type, age_min, len_lower
                 , len_upper, num_players_min, num_players_max)
    VALUES ('Perfection', 2, 2, 5, 1, 15, 1, 10);
INSERT INTO game ( name, genre_id, game_type, age_min, len_lower
                 , len_upper, num_players_min, num_players_max)
    VALUES ('Uno', 4, 1, 5, 15, 30, 2, 10);
INSERT INTO game ( name, genre_id, game_type, age_min, len_lower
                 , len_upper, num_players_min, num_players_max)
    VALUES ('Phase 10', 4, 1, 7, 45, 60, 2, 6);
INSERT INTO game ( name, genre_id, game_type, age_min, len_lower
                 , len_upper, num_players_min, num_players_max)
    VALUES ('Monopoly Deal', 4, 1, 8, 15, 30, 2, 5);
INSERT INTO game ( name, genre_id, game_type, age_min, len_lower
                 , len_upper, num_players_min, num_players_max)
    VALUES ('Skip-Bo', 4, 1, 7, 20, 30, 2, 6);

\echo 'INSERTING INTO wishlist';
INSERT INTO wishlist (user_id, game_id, is_owned)
    VALUES (1, 1, true);
INSERT INTO wishlist (user_id, game_id, is_owned)
    VALUES (1, 2, false);
INSERT INTO wishlist (user_id, game_id, is_owned)
    VALUES (1, 3, false);
INSERT INTO wishlist (user_id, game_id, is_owned)
    VALUES (1, 4, true);
INSERT INTO wishlist (user_id, game_id, is_owned)
    VALUES (2, 1, false);
INSERT INTO wishlist (user_id, game_id, is_owned)
    VALUES (2, 5, true);
INSERT INTO wishlist (user_id, game_id, is_owned)
    VALUES (2, 6, true);
INSERT INTO wishlist (user_id, game_id, is_owned)
    VALUES (3, 3, false);
INSERT INTO wishlist (user_id, game_id, is_owned)
    VALUES (3, 4, false);
INSERT INTO wishlist (user_id, game_id, is_owned)
    VALUES (3, 1, false);
INSERT INTO wishlist (user_id, game_id, is_owned)
    VALUES (3, 7, true);
INSERT INTO wishlist (user_id, game_id, is_owned)
    VALUES (3, 8, false);
