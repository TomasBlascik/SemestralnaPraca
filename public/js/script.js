    quote = document.getElementById("quote");
    quote.onmouseover = function () {
        quote = document.getElementById("quote");
        var quotes = [];
        quotes[0] = "“May the Force be with you.” -Star Wars, 1977";
        quotes[1] = "“My precious.” -The Lord of the Rings: Two Towers, 2002";
        quotes[2] = "“Houston, we have a problem.” -Apollo 13, 1995";
        quotes[3] = "“Here's Johnny!” -The Shining, 1980";
        quotes[4] = "“You either die a hero or live long enough to see yourself become the villain.” -The Dark Knight, 2008";
        quotes[5] = "“The first rule of Fight Club is: you do not talk about Fight Club.“ -Fight Club, 1999";
        quotes[6] = "“Keep your friends close, but your enemies closer.“ -The Godfather Part II, 1974";
        quotes[7] = "“Why so serious?“ -The Dark Knight, 2008";
        quotes[8] = "“Remember, remember, the Fifth of November.” -V for Vendetta, 2005";
        quotes[9] = "“Life is like a box of chocolates, you never know what you're going to get.” –Forrest Gump, 1994";

        var random = Math.floor(Math.random() * quotes.length);
        quote.innerHTML = quotes[random];
    }