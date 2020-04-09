<?php

function getRole($role)
{
        if(Auth::user())
        {
                if($role == '1')
                {
                        return 'Human Resource';
                }

                if($role == '2')
                {
                        return 'Team Leader';
                }

                if($role == '3')
                {
                        return 'Employee';
                }

                if($role == '4')
                {
                        return 'CEO';
                }
        }
}