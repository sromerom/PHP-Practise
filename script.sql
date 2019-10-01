DROP DATABASE IF EXISTS Llibreria;
CREATE DATABASE IF NOT EXISTS Llibreria;


USE Llibreria;

/*Creacio de les taules*/
CREATE TABLE llibres (
    id_llibre INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    titol VARCHAR(150) NOT NULL,
    autor VARCHAR(100),
    descripcio TEXT NOT NULL,
    uri VARCHAR(255) NOT NULL,
    data_afegit DATE 
);

/* Creacio de les dades */
INSERT INTO llibres VALUES (1, 'La Chica que vivio dos veces', 'David Lagercrantz', 'Toda gran historia merece un gran final. El cierre de una serie que ha vendido más de 100 millones de ejemplares en todo el mundo.
Lisbeth Salander está preparada para la batalla final contra la única persona que, siendo idéntica a ella, es su opuesta en todo: su hermana Camilla. Pero esta vez, 
Lisbeth tomará la iniciativa.Ha dejado atrás Estocolmo, lleva un nuevo peinado y se ha quitado los piercings. Podría pasar por una ejecutiva más. 
Pero las ejecutivas no ocultan una pistola bajo la americana, no son hackers expertas ni llevan cicatrices ni tatuajes que les recuerdan que han sobrevivido a lo imposible.
Mikael Blomkvist, por su parte, está investigando la muerte de un mendigo del que sólo se sabe que ha fallecido pronunciando el nombre del ministro de Defensa del gobierno 
sueco y que guardaba el número de teléfono del periodista en el bolsillo. Mikael necesitará la ayuda de Lisbeth, 
pero para ella el pasado es una bomba a punto de explotar.', 'https://imagessl5.casadellibro.com/a/l/t1/65/9788423356065.jpg', now());

INSERT INTO llibres VALUES (2, 'La escuela catolica', 'Edoardo Albinati', '¿QUÉ SIGNIFICA SER UN HOMBRE? LA GRAN NOVELA GANADORA DEL PREMIO STREGA «Una obra de ficción maximalista 
comparable conKnausgård, Bolaño oFerrante.»
JonathanGalassi, editor de FSG (EE UU)
¡Qué sencillo y bonito habría sido no tener sexualidad!
Un grupo de antiguos alumnos de una prestigiosa escuela privada cometen uno de los crímenes más brutales. En ese momento, Edoardo Albinati 
también iba a esa escuela de sacerdotes católicos. Durante cuarenta años ha guardado el secreto de aquella mala educación, y ahora lo afronta sin tapujos. El resultado es una novela asombrosa, que trata del sexo, de la religión y de la violencia, del dinero, la amistad y la venganza. Una lectura estremecedora de la que no se sale indemne.
La crítica ha dicho...
«Una obra de ficción maximalista comparable con Knausgård, Bolaño o Ferrante.»
Jonathan Galassi, editor de FSG (EE UU)
«1.296 páginas ¿son demasiadas? Para una novela, casi siempre lo son. Pero si se trata de una tentativa de comprender el mundo, 
como en el caso del libro de Albinati, de hallar un modo de estar en el mundo, entonces no. Entonces son pocas. Demasiado pocas. [...] 
No es solo un libro importante, sino grandioso. Una narración absolutamente origina...', 'https://imagessl7.casadellibro.com/a/l/t1/97/9788426403797.jpg', now());



INSERT INTO llibres VALUES (3, 'El pintor de almas', 'Ildefonso Falcones', 'Después de vender más de 10 millones de ejemplares Ildefonso Falcones vuelve con una fascinante novela. Una 
poderosa historia de amor, pasión por el arte, revueltas sociales y venganza en la Barcelona modernista. Barcelona, 1901. La ciudad vive días 
de gran agitación social. La oscura miseria de los más desfavorecidos contrasta con la elegante opulencia de las grandes avenidas, donde ya 
destacan algunos edificios singulares, símbolo de la llegada del Modernismo.
Dalmau Sala, hijo de un anarquista ajusticiado, es un joven pintor que vive atrapado entre dos mundos. Por un lado, su familia y Emma, la mujer que ama, 
son firmes defensores de la lucha obrera; hombres y mujeres que no conocen el miedo a la hora de exigir los derechos de los trabajadores. Por otro, su 
trabajo en el taller de cerámica de don Manuel Bello, su mentor y un conservador burgués de férreas creencias católicas, lo acerca a un ambiente donde 
imperan la riqueza y la innovación creativa.
De este modo, seducido por las tentadoras ofertas de una burguesía dispuesta a comprar su obra y su conciencia, Dalmau tendrá que encontrar su auténtico 
camino, como hombre y como artista, y alejarse de las noches de vino y drogas para descubrir lo que de verdad le importa: sus valores, su esencia, 
el amor de una mujer valiente y luchadora y, sobre todo, esos cuadros que brotan de su imaginación y capturan en un lienzo las almas más miserables que 
deambulan por las calles de una ciudad agitada por el germen de la rebeldía.
Con El pintor de almas, Ildefonso Falcones nos ofrece la poderosa historia de una época convulsa al tiempo que nos brinda una trama emocionante donde el amor,
 la pasión por el arte, la lucha por los ideales y la venganza se combinan con maestría para recrear una Barcelona, antaño sobria y gris, que ahora se encamina 
 hacia un futuro brillante donde el color y la esperanza empiezan a extenderse por sus casas y sus calles.', 'https://imagessl4.casadellibro.com/a/l/t1/44/9788425357244.jpg', now());

INSERT INTO llibres VALUES (4, 'Sidi', 'Arturo Perez-Reverte', 'La nueva novela de Arturo Pérez-Reverte.
No tenía patria ni rey, sólo un puñado de hombres fieles.
No tenían hambre de gloria, sólo hambre.
Así nace un mito.
Así se cuenta una leyenda.
«El arte del mando era tratar con la naturaleza humana, y él había dedicado su vida a aprenderlo. Colgó la espada del arzón, palmeó 
el cuello cálido del animal y echó un vistazo alrededor: sonidos metálicos, resollar de monturas, conversaciones en voz baja. 
Aquellos hombres olían a estiércol de caballo, cuero, aceite de armas, sudor y humo de leña.
»Rudos en las formas, extraordinariamente complejos en instintos e intuiciones, eran guerreros y nunca habían pretendido ser otra cosa. 
Resignados ante el azar, fatalistas sobre la vida y la muerte, obedecían de modo natural sin que la imaginación les jugara malas pasadas. 
Rostros curtidos de viento, frío y sol, arrugas en torno a los ojos incluso entre los más jóvenes, manos encallecidas de empuñar armas y pelear. 
Jinetes que se persignaban antes de entrar en combate y vendían su vida o muerte por ganarse el pan. Profesionales de la frontera, sabían luchar con 
crueldad y morir con sencillez.
»No eran malos hombres, concluyó. Ni tampoco ajenos a la compasión. Sólo gente dura en un mundo duro.»
«En él se funden de un modo fascinante la aventura, la historia y la leyenda. Hay muchos Cid en la tradición española, y éste es el mío.»
Arturo Pérez-Reverte', 'https://imagessl3.casadellibro.com/a/l/t1/73/9788420435473.jpg', now());



INSERT INTO llibres VALUES (5, 'El latido de la tierra', 'Luz Gabas', 'Cuando el amor es verdadero, simplemente se escucha al corazón. Vuelve Luz Gabás con su novela más sentida. 
Alira, heredera de la mansión y las tierras que su familia conserva desde hace generaciones, se debate entre mantenerse fiel a sus orígenes o 
adaptarse a los nuevos tiempos. Cuando cree encontrar la respuesta a sus dudas, una misteriosa desaparición perturba la aparente calma que reinaba 
en la casa, la única habitada en un pequeño pueblo abandonado. Un guiño del destino la obligará a enfrentarse a su pasado y a cuestionarse cuanto 
para ella había sido inmutable. A partir de ese momento comenzará a sentir algo para lo que nunca pensó estar preparada: el amor.Luz Gabás construye 
de manera magistral una bella historia de pasión, lealtad, intriga y sentimientos encontrados. «Después de Palmeras en la nieve, El latido de la tierra 
es mi novela más sentida, más personal. En ella he volcado mis emociones, la historia de los que me rodean, la vida de un valle lejano pero que late con 
fuerza» Luz Gabás', 'https://imagessl1.casadellibro.com/a/l/t1/81/9788408214281.jpg', now());


INSERT INTO llibres VALUES (6, 'Los testamentos', 'Margaret Atwood', 'En esta brillante secuela de El cuento de la criada, la aclamada autora Margaret Atwood responde a las preguntas
 que han cautivado a los lectores durante décadas.
«Subo y penetro en la oscuridad del interior; o en la luz.»
Cuando las puertas de la furgoneta se cerraron de golpe tras Offred al final de El cuento de la criada, los lectores no tenían forma de saber cuál 
iba a ser su futuro: la libertad, la prisión o la muerte. 
Con la publicación de Los testamentos, la espera ha terminado. Margaret Atwood recupera la historia quince años después de que Offred se adentrara en lo 
desconocido, con los testimonios asombrosos de tres narradoras del mundo de Gilead.
«Queridos lectores y lectoras: vuestras preguntas sobre Gilead y su funcionamiento interno han sido la fuente de inspiración de este libro. ¡Bueno, casi todo! 
La otra es el mundo en el que vivimos.»
Margaret Atwood', 'https://imagessl4.casadellibro.com/a/l/t1/94/9788498389494.jpg', now());

INSERT INTO llibres VALUES (7, 'El Ateniense', 'Pedro Santamaria Fernandez', 'Grecia se precipita hacia una guerra como nunca ha visto ni verá el mundo. La Atenas de Pericles domina los mares, 
Esparta es invencible en tierra. Y ambas ciudades pugnan por convertirse en la líder indiscutible de la Hélade en un conflicto completamente asimétrico 
que durará cerca de treinta años y después del cual la Grecia luminosa no será más que un lejano recuerdo. Esta es la historia de uno de los personajes 
más controvertidos de la antigüedad: Alcibíades, el ateniense. Familiar y protegido de Pericles, discípulo y amigo de Sócrates, omnipresente en la obra 
de Platón, rival de Nicias, amante de la reina de Esparta. Estratega y demagogo, político y guerrero, traidor y patriota. El más bello de los griegos y 
el más acaudalado de los atenienses. Cruel en el amor, valiente y decidido en la guerra. Implacable y calculador…Fiel reflejo de una Atenas y de una época 
que sentó las bases de la sociedad occidental.', 'https://imagessl2.casadellibro.com/a/l/t5/22/9788417683122.jpg', now());

INSERT INTO llibres VALUES (8, 'Cuando el oro aprieta', 'Björn Blanca Van Goch', 'En Cuando el oro aprieta estamos ante una aventura ferozmente divertida, en la que un bandolero sevillano huye a América 
atraído por la fiebre del oro de 1849. Una serie de disparatados contratiempos lo llevan hasta el remoto pueblo de Sinner Horn. Entre un elenco de 
variopintos personajes y siempre acompañado por las travesuras de un niño, se verá obligado a investigar unos extraños sucesos que están perturbando las 
rutinas del Salvaje Oeste. Con el peso de la nostalgia sobre sus espaldas, puede que únicamente en la resolución de dichas intrigas se encuentre su billete 
de vuelta a las añoradas tierras de las que procede. ', 'https://imagessl4.casadellibro.com/a/l/t5/14/9788412007114.jpg', now());