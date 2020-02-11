DROP TABLE IF EXISTS topic;
DROP TABLE IF EXISTS scriptures_topic;

CREATE TABLE topic
( id    SERIAL          NOT NULL PRIMARY KEY
, name  VARCHAR(100)    NOT NULL
);

CREATE TABLE scriptures_topic
( scripture_id INT NOT NULL REFERENCES scriptures(id)
, topic_id     INT NOT NULL REFERENCES topic(id)
);

INSERT INTO topic (name) VALUES ('Faith');
INSERT INTO topic (name) VALUES ('Sacrifice');
INSERT INTO topic (name) VALUES ('Charity');
