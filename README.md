# Web-Games
Simple versions of the Guess Game, 15-Puzzle Game, Peg Solitaire and Mastermind.

Developers: Viju Hiremath and Alexandre Gagne

Architected so that it uses:

1) Model, View, Controller
2) A Front Controller which implements a finite state machine.
	All requests go through index.php

This combination allows

1) Separation of concerns (M/V/C)
2) The application can move from any page to any other page
3) Easy to extend and expand code
4) Self documenting code. Nothing is hidden more than a file away.

New user stories written in new-user-stories.txt
