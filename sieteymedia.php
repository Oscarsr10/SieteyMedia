<?php
 $palos= array("bastos","copas","espadas","oros");
 $cartas= array("As",2,3,4,5,6,7,"Sota","Caballo","Rey");
$otro="si";
do{
    //Inicio de la partida
    for($x=0;$x<count($palos);$x++) 
     {
        echo "\n".$palos[$x];
        for($y=0;$y<count($cartas);$y++)
        {
                
            $encontrado[$x][$y]=false;
        }
    }
    
    echo "Bienvenido al maravilloso juego Siete y Media \n";
    echo "Tienes que acumular 7,5 sin pasarse \n";
    echo "Tu rival es la propia maquina\n";
    echo"\n\n";
    
    juego($palos, $cartas);
    echo "\n Escribe SI para jugar otra vez:";
    $otro = trim(fgets(STDIN));
    $otro = strtolower($otro);
} while($otro=="si");
    echo "\n hasta otra ";
function juego($palos, $cartas){
  
   
    $contador[0]=0;
    $contador[1]=0;
    $fin=false;
    
    
    while(!$fin)
    {
        if($contador[0]<=$contador[1])
        {
            echo "Juega la maquina \n";
            $contador[0]+=tirada($palos, $cartas);
            echo "\t \t Los puntos acumulados por la maquina son $contador[0] \n";
            
        }
        else{
            echo "***********************************\n";
            echo "La maquina pasa turno \n";
            echo "***********************************\n";
        }
        if ($contador[0]>7.5)
        {
            echo "El jugador gana";
            $fin=true;
            return;
           
        }
      
         if($contador[1]<=$contador[0])
        {
            echo "Juega el usuario \n";
            $contador[1]+=tirada($palos, $cartas);  
            echo "\t \t Los puntos acumulados por el jugador son $contador[1] \n";
        }
         else{
            echo "Para pasar escribe P:";
            $line = trim(fgets(STDIN));
            if ($line=="P")
            {
                 echo "***********************************\n";
                 echo "El jugador pasa turno \n";
                 echo "***********************************\n";
            }
            else
            {
                echo "Juega el usuario \n";
                 $contador[1]+=tirada($palos, $cartas);  
                 echo "\t \t Los puntos acumulados por el jugador son $contador[1] \n";
            }
             
        }
        echo"\n\n";
        if ($contador[1]>7.5 ||($contador[0]==$contador[1] && $fin))
        {
            echo "La maquina gana \n";
            $fin=true;
            return;
        }
        elseif ($contador[0]>7.5 )
        {
            echo "El jugador gana";
            return;
           
        }
        echo"\n";
    }
}
function tirada($palos, $cartas)
{
global $encontrado; 
do{
 $palo=rand(0, 3);
 $carta=rand(0, 9 );
} while ($encontrado[$palo][$carta]==true);
$valor= valorc($cartas,$carta);
 echo "\t La carta seleccionada al azar es  $cartas[$carta] de $palos[$palo] y vale: $valor \n";
$encontrado[$palo][$carta]=true;
return $valor;
}
function valorc($cartas,$carta)
{
    if($cartas[$carta]=="As")
    {
    return 1;
    }
    elseif(is_numeric($cartas[$carta]))
    {
        return $cartas[$carta];
    }
    else
    {
        return 0.5;
    }
}
?>
