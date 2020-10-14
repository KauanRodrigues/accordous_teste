<?php

function is_logged()
{
    if(empty(session()->get('FUNCIONARIO')))
    {
        return redirect()->route('login');
    }
}