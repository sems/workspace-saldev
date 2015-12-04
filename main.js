$(document).ready(function() {
    //The todo items that are already saved in localstorage are getting pulled out of it and getting displayed.
    var print = function() {
        //Getting the todo-string
        var todoArray = JSON.parse(localStorage.getItem("todo"));
        var arrayItems = todoArray.items;

        console.log(arrayItems);
        //The sort function
        arrayItems.sort(function(a, b) {
            return parseFloat(b.prio) - parseFloat(a.prio);
        });
        $("#output").empty();
        //The todo-object are getting showed until there's nothing left
        //They are getting showed of the in 'output' div
        for(var i = 0; i < arrayItems.length; i++) {
            $("#output").append('<div class="item">' + '<a href="https://www.google.nl/">Remove</a>' +'</div>');
        }
    }



    //Add item when Click event
    //jQuery start searching for button
    $("#toevoegenBttn").click(function() {
        //The todo item is getting pulled out of localstorage
        var todoArray = JSON.parse(localStorage.getItem("todo"));
        //The Priority is getting searched in the HTML
        var prio = $("#prio").val();
        //jQuery is going to search for the description of the new element.
        var text = $("#text").val();
        //The new object contains: an id, text and priority.
        var newObject = {
            id: todoArray.nextId,
            text: text,
            prio: prio
        };
        todoArray.items.push(newObject);
        //The id is added up by 1
        todoArray.nextId++;
        //Item is getting stringified and put in to localstorage
        localStorage.setItem("todo", JSON.stringify(todoArray));
        print();
    });
    if(localStorage.getItem("todo") === null) {
        var todoArray = {
            items: [],
            nextId: 0
        };
        localStorage.setItem("todo", JSON.stringify(todoArray));
    }
    print();

    $("#delete").click(function() {
        localStorage.removeItem("todo");
    })
});
