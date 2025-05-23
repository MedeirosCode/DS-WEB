package com.example.atividade01
import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.activity.enableEdgeToEdge
import androidx.compose.foundation.background
import androidx.compose.foundation.clickable
import androidx.compose.foundation.layout.*
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.material3.Card
import androidx.compose.material3.Surface
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.text.TextStyle
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import com.example.atividade01.ui.theme.Atividade01Theme

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContent {
            Atividade01Theme {
                MyApp()
            }
        }
    }
}

@Composable
fun MyApp() {
    Surface(
        modifier = Modifier
            .fillMaxSize()
            .background(Color(0xFF546E7A)),
        color = Color(0xFF546E7A)
    ) {
        Column(
            modifier = Modifier.fillMaxSize(),
            verticalArrangement = Arrangement.Center,
            horizontalAlignment = Alignment.CenterHorizontally
        ) {
            ContactCard(
                name = "João Silva",
                phone = "(11) 99999-9999",
                email = "joao@email.com"
            )

            Spacer(modifier = Modifier.height(16.dp))

            ContactCard(
                name = "Maria Souza",
                phone = "(21) 98888-8888",
                email = "maria@email.com"
            )
        }
    }
}

@Composable
fun ContactCard(name: String, phone: String, email: String) {
    Card(
        modifier = Modifier
            .padding(8.dp)
            .fillMaxWidth(0.8f)
            .height(150.dp)
            .clickable {

            },
        shape = RoundedCornerShape(16.dp)
    ) {
        Column(
            modifier = Modifier
                .fillMaxSize()
                .background(Color(0xFFB0BEC5)) // cor de fundo do card
                .padding(16.dp),
            verticalArrangement = Arrangement.Center,
            horizontalAlignment = Alignment.CenterHorizontally
        ) {
            Text(text = "Nome: $name", style = TextStyle(fontSize = 16.sp, color = Color.Black))
            Text(text = "Tel: $phone", style = TextStyle(fontSize = 14.sp, color = Color.Black))
            Text(text = "Email: $email", style = TextStyle(fontSize = 14.sp, color = Color.Black))
        }
    }
}