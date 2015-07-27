GtriasWatchBundle
=================

This bundle defines dynamic action to be executed when something in your entities changes.
It works setting a field to watch and executing an action from a custom service.

The service must receive the changed entity, execute any piece of code and mark
the given entity changed criteria in state not to be executed again.

The way we will handle the changed state is implementing some method
on target entity, something like ``hasExpired`` or ``hasChanged``. It's
responsability of the target entity to know its changed state.

Setup
-----

In order to make this bundle work you has to set up a cronjob running
the check command.
