/**
Get Default empty todo-list object.
@return object empty todo-list.
*/
var getDefaultObject = function() {
    return {
        list: [],
        id: 0,
    };
};


/**
 * [[Description]]
 * @param {object} todoObject  the todo-list object
 * @param {string} description description /todo task
 */
var addTodoItem = function(todoObject, description, prio){
    todoObject.id += 1;
    todoObject.list.push({
        description: description,
        id: todoObject.id,
        prio: prio
    });
};

/**
 * show the todo list in an element found with jQuery
 * @param {object} todoObject the todo-object
 * @param {objec}  element    jQuery ibject referring to HTML element
 */


var showTodoList = function(todoObject, element) {
    if (todoObject.list.length !== 0) {
        element.html('');
        
        for(var itemIndex = 0; itemIndex < todoObject.list.length; itemIndex += 1) {
            var currentItem = todoObject.list[itemIndex];
            var newElement = $('<div class="todo-item"></div>');
            var description = currentItem.description;
            
            newElement.text(description);
            newElement.appendTo(element);
        }
    }
};



var saveTodoList = function(todoObject) {
    var asJsonString = JSON.stringify(todoObject);
    localStorage.setItem('tasks', asJsonString);
};

/**
 * loading 
 * @returns {[[Type]]} [[Description]]
 */
var loadTodoList = function(){
    var asJsonString = localStorage.getItem('tasks');
    var todo = getDefaultObject();
    if(typeof asJsonString === "string") {
        try{
            todo = JSON.parse(asJsonString);
        } catch(exception) {
            return todo;
        }
    }
    
    return todo;
};


$(document).ready(function() {
    //Deze code wordt uitgevoerd wanneer alle Document Object Model klaar.
    var tempTodoObject = loadTodoList();
    var htmlListElement = $('#lijst');
    
    //addTodoItem(tempTodoObject, "Finsch my bloddy todo list")
    //addTodoItem(tempTodoObject, "Arrive somewhat safely..")
    
    
    showTodoList(tempTodoObject, htmlListElement);
    
    var itemForm = $('#item-form');
    var descInput = $('#omschrijving');
    itemForm.submit(function() {
        var Prioriteit = $('#prioriteit').val();
        var text = descInput.val();
        if(text.trim() !== "") {
            addTodoItem(tempTodoObject, text, Prioriteit);
            showTodoList(tempTodoObject, htmlListElement); 
            saveTodoList(tempTodoObject);
            descInput.val('');
        }
        
        return false;
        
    });
});































