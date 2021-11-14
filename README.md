# RepterProject

>Szerző



>>Csapat: Pap András, Farkas Péter, Pardi Polett\
>>Gyakorlatvezető tanár neve: Várkonyi Tibor\
>>Feladat megnevezése: Repülünk!\
>>Tartalom

>Szerző\
>Tartalom\
>Felhasználói dokumentáció\
>Feladat\
>Környezet\
>Használata\
>Alkalmazások\
>Menüpontok\
>Kezdőlap\
>Hivatkozások\
>Reptér választás\
>Fekete / Fehér háttér\
>Adatok frissítés\
 
>Felhasználói dokumentáció\
>>Feladat\
>>>Egy repülőgép felügyeleti szolgáltatást valósítottunk meg a weboldalunkon. A kiválasztott reptérnek láthatod a valós idejű indulási és érkezési, késési adatait az elkövetkezendő 8 órára. A programot egy ingyenes API szolgáltatással alkottuk meg PHP-ban. Felhasználóbarát, valamint a docker segítségével könnyen módosítható.\
>>Környezet\
>>Az oldal bármilyen böngészőben futtatható.\
>Használata\
>>Alkalmazások\
	>>>Alkalmazások: Docker Desktop, Visual Studio Code, GitHub Desktop\
>>>Letöltjük a GitHub-ról a projektünket, megnyitjuk a Visual Studio Code-ban. A menüpontokból kiválasztjuk a Terminalt majd New Terminalt.  Eközben elindítjuk a docker programot. Ha ez megtörtént, visszalépünk a kódunkhoz és beírjuk a következőt: docker-compose up -d web. Ahhoz, hogy sikerüljön kell a projekt mappánkban lennie egy conf és egy www mappának, valamint egy .env, egy docker-compose.yml valamint egy Dockerfile-nak.\
>>Kezdőlap\
>>>Az oldal tetején egy menüsáv található, ahol az alábbi menüpontok vanna: Rólunk, Hivatkozások (ezek átirányítanak egy másik oldalra), egy lenyíló lista (ahol ki lehet választani a repülőteret, majd a hozzátartozó adatok megjelennek), egy gomb (amin ki lehet választani, hogy fehér vagy fekete színű legyen a háttérszín), egy ikon gomb (az adatok frissítését szolgálja).\
A felhasználó, az oldalon láthatja, a kiválasztott repülőtérhez tartozó valós idejű 8 órán belüli indulási, érkezési, késési adatokat.\
>>Hivatkozások\
>>>Az oldalon a felhasznált légitársaságok honlapjai vannak összeszedve egy táblázatba.\
>>Lenyíló lista\
>>>A lenyíló listában találhatóak a repterek összeszedve. Ha 8 órán belül nem indul/érkezik járat automatikusan „Jelenleg egyik reptérről sem indul/érkezik járat 8 órán belül!” üzenet lesz a repterek kilistázása helyett.\
>>Fekete / Fehér háttér\
>>>A felhasználó kiválaszthatja, az oldal háttérszínét, hogy fekete vagy fehér legyen.\
>>Adatok frissítése\
>>>A képre kattintva az adatok lefrissülnek és betöltődnek a legfrissebb állapotra.\

