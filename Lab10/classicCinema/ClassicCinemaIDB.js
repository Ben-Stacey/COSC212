var ClassicCinemaIDB = (function () {
    /* A closure to demonstrate basic use of indexeddb
    * Adapted from https://developer.mozilla.org/en-US/docs/Web/API/IndexedDB_API/Using_IndexedDB
         * Nick Meek 2019
    */
    'use strict';


    //if indexeddb is not supported then no use continuing
    if (!window.indexedDB) {
        window.alert("Your browser doesn't support a stable version of IndexedDB."); return;
    }
    var pub = {}; //usual public interface
    var db;
    const dbName = "ClassicCinema";

    //Some movie data to get us started
    const movieData = [
        {
            title: "Gone With the Wind (1939)",
            director: ["Victor Fleming", "George Cukor", "Sam Wood"],
            starring: ["Clark Gable", "Vivien Leigh", "Leslie Howard", "Olivia deHavilland", "Hattie McDaniel"],
            comments: "An epic historical romance and winner of 8 Academy Awards(from 13 nominations).",
            price: 13.99
        },
        {
            title: "The Jazz Singer (1927)",
            director: ["Alan Crosland"],
            starring: ["Al Jolson", "May McAvoy", "Warner Oland", "Cantor Rosenblatt"],
            comments: "The first feature length 'talkie', The Jazz Singer is a piece of cinematic history",
            price: 13.99
        },
        {
            title: "Metropolis (1927)",
            director: ["Fritz Lang"],
            starring: ["Alfred Abel", "Brigitte Helm", "Gustav Frohlich", "RudolfKlein-Rogge"],
            comments: "A lovingly restored version of Fritz Lang's dystopian masterpiece, one of the great achievements of the silent era.",
            price: 19.99
        }
        ];

        var request = indexedDB.open(dbName, 1); // Request to open a db

        //an error handler for the request
        request.onerror = function (event) {
            alert("Opening db error " + request.error);
        };

        //a success handler
        request.onsuccess = function (event) {
            alert("Database successfully created.")
        };

        //This function runs before onsuccess, if needed i.e.
        // no db exists or
        // version number is higher than existing db
        request.onupgradeneeded = function (event) {
            db = event.target.result;

            // Create an objectStore to hold information about our movies. We're
            // going to use "title" as our key path because it's guaranteed to be
            // unique.
            var movieObjectStore = db.createObjectStore("movies", {keyPath: "title"});
            // Create an index to search movies by title. We want to ensure that // no two movies have the same title, so use a unique index.
            movieObjectStore.createIndex("title", "title", {unique: true});

            // Use transaction oncomplete to make sure the objectStore creation is
            //finished before adding data into it.
            movieObjectStore.transaction.oncomplete = function (event) {
                // Store values in the newly created objectStore.
                    var customerObjectStoreTransaction = getObjectStore("movies", "readwrite");
                    movieData.forEach(function (m) {
                        customerObjectStoreTransaction.add(m);
                    });
            };
        };

        /**
         * Utility function to start a transaction on the specified objectStore(s) * and return the object store.
         * @param {string} store_name
         * @param {string} mode either "readonly" or "readwrite"
         * @return objectStore
         */
        function getObjectStore(store_name, mode) {
            var tx = db.transaction(store_name, mode);
            return tx.objectStore(store_name);
        }

        /**
         * Displays the title, price and rating of a specified movie
         * @param {string} title The title of the movie you want to find */
        pub.getMovieInfo = function (title) {
            var store = getObjectStore("movies");
            var request = store.get(title);
            //error handler
            request.onerror = function (e) {
                alert("getMovieInfo error " + request.error);
            };
            //success handler
            request.onsuccess = function (e) {
                alert(request.result.title + "\n" + request.result.price + "\n" + request.result.director);
            };
        };

        /**
         * Adds a movie to the objectStore
         * @param {object} movieData The object you want added to the store. * The movieData object must take the following form:
         * title: {string}
         * director: [<string>]
         * starring: [<string>]
         * comments: {string}
         * price: {float}
         */
        pub.addMovie = function (movieData) { //start the transaction and get the store
            var store = getObjectStore("movies", "readwrite");
            var request = store.add(movieData);
            //success handler
            request.onsuccess = function (event) {
                alert("movie Added");
            };
            //error handler
            request.onerror = function (event) {
                alert("addMovie error", this.error);
            }
        };
            return pub;
        }());
