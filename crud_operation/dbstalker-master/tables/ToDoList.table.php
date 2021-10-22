<?php

class ToDoList extends Stalker_Table
{

    public function schema()
    {
        return Stalker_Schema::build(function ($table) {
            $table->int("id", 11);
            $table->varchar("text", 200);
            $table->id("id")->primary();
        });
    }
}
?>