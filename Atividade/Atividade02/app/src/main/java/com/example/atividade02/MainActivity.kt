package com.example.atividade02

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.activity.enableEdgeToEdge
import androidx.compose.foundation.background
import androidx.compose.foundation.clickable
import androidx.compose.foundation.layout.*
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.material3.*
import androidx.compose.runtime.Composable
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.text.TextStyle
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import com.example.atividade02.ui.theme.Atividade02Theme

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContent {
            Atividade02Theme {
                MyApp()
            }
        }
    }
}

@Composable
fun MyApp() {
    Surface(
        modifier = Modifier.fillMaxSize(),
        color = Color(0xFF546E7A)
    ) {
        Column(
            modifier = Modifier.fillMaxSize(),
            verticalArrangement = Arrangement.Center,
            horizontalAlignment = Alignment.CenterHorizontally
        ) {
            ContactCard(
                name = "Trembolona",
                price = 0.10f
            )

            Spacer(modifier = Modifier.height(16.dp))
        }
    }
}

@Composable
fun ContactCard(name: String, price: Float) {
    Card(
        modifier = Modifier
            .padding(8.dp)
            .fillMaxWidth(0.8f)
            .height(180.dp) // Aumentado para comportar o botão
            .clickable {
                // ação de clique no card, se desejar
            },
        shape = RoundedCornerShape(16.dp)
    ) {
        Column(
            modifier = Modifier
                .fillMaxSize()
                .background(Color(0xFFB0BEC5)) // cor de fundo do card
                .padding(16.dp),
            verticalArrangement = Arrangement.SpaceBetween,
            horizontalAlignment = Alignment.CenterHorizontally
        ) {
            Column(
                horizontalAlignment = Alignment.CenterHorizontally
            ) {
                Text(
                    text = "Nome: $name",
                    style = TextStyle(fontSize = 16.sp, color = Color.Black)
                )
                Text(
                    text = "Preço: R$ %.2f".format(price),
                    style = TextStyle(fontSize = 14.sp, color = Color.Black)
                )
            }

            // Botão circular "Comprar"
            Card(
                modifier = Modifier
                    .size(80.dp)
                    .clickable {
                        // ação ao clicar no botão "Comprar"
                    },
                shape = RoundedCornerShape(40.dp), // Circular
                colors = CardDefaults.cardColors(containerColor = Color(0xFF4CAF50))
            ) {
                Box(
                    contentAlignment = Alignment.Center,
                    modifier = Modifier.fillMaxSize()
                ) {
                    Text(
                        text = "Comprar",
                        style = TextStyle(color = Color.White, fontSize = 14.sp)
                    )
                }
            }
        }
    }
}


@Preview(showBackground = true)
@Composable
fun MyAppPreview() {
    Atividade02Theme {
        MyApp()
    }
}
