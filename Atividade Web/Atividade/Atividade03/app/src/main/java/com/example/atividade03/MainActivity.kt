package com.example.atividade03

import android.os.Bundle
import android.util.Log
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.activity.enableEdgeToEdge
import androidx.compose.foundation.clickable
import androidx.compose.foundation.layout.*
import androidx.compose.foundation.shape.CircleShape
import androidx.compose.material3.Card
import androidx.compose.material3.Surface
import androidx.compose.material3.Text
import androidx.compose.runtime.*
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.text.TextStyle
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import com.example.atividade03.ui.theme.Atividade03Theme

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContent {
            MyApp()
        }
    }
}

@Composable
fun MyApp() {
    var moneyCounter by remember { mutableStateOf(0) }
    var contadorDePontos by remember { mutableStateOf(0) }

    Surface(
        modifier = Modifier
            .fillMaxHeight()
            .fillMaxWidth(),
        color = Color(0xFF546E7A)
    ) {
        Column(
            verticalArrangement = Arrangement.Center,
            horizontalAlignment = Alignment.CenterHorizontally,
            modifier = Modifier.fillMaxSize()
        ) {
            Text(
                text = "Time A",
                style = TextStyle(
                    color = Color.White,
                    fontSize = 30.sp
                )
            )
            Spacer(modifier = Modifier.height(50.dp))
            Text(

                text = "$moneyCounter",
                style = TextStyle(
                    color = Color.White,
                    fontSize = 30.sp
                )
            )


            Spacer(modifier = Modifier.height(100.dp))



            CreateCircle(moneyCounter) {
                moneyCounter += 1
            }

            Spacer(modifier = Modifier.height(100.dp))

            Text(
                text = "Time B",
                        style = TextStyle(
                        color = Color.White,
                fontSize = 30.sp
            )
            )
            Spacer(modifier = Modifier.height(50.dp))

            Text(
                text = "$contadorDePontos",
                style = TextStyle(
                    color = Color.White,
                    fontSize = 30.sp
                )
            )
            Spacer(modifier = Modifier.height(100.dp))

            CriarCirculo(contadorDePontos){
                contadorDePontos +=1
            }

        }
    }
}

@Composable
fun CreateCircle(moneyCounter: Int, onTap: () -> Unit) {
    Card(
        modifier = Modifier
            .padding(3.dp)
            .size(105.dp)
            .clickable {
                onTap()
                Log.d("Contador", "CreateCircle: $moneyCounter")
            },
        shape = CircleShape
    ) {
        Box(
            modifier = Modifier.fillMaxSize(),
            contentAlignment = Alignment.Center
        ) {
            Text(text = "Tap")
        }
    }
}

@Composable
fun CriarCirculo(contadorDePontos: Int, onTap: () -> Unit) {
    Card(
        modifier = Modifier
            .padding(3.dp)
            .size(105.dp)
            .clickable {
                onTap()
                Log.d("Contador", "CreateCircle: $contadorDePontos")
            },
        shape = CircleShape
    ) {
        Box(
            modifier = Modifier.fillMaxSize(),
            contentAlignment = Alignment.Center
        ) {
            Text(text = "Tap")
        }
    }
}