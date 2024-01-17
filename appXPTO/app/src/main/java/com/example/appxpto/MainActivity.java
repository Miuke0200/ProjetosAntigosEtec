package com.example.appxpto;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity {

    Button btnProximo, btnVoltar;
    EditText edtSalario, edtNome;
    TextView txtNome;
    TextView txtSalarioL;
    TextView txtDesconto;
    TextView txtAuxilio;

    String txtNomeFunc;
    int txtSalarioFunc;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        edtSalario = findViewById(R.id.edtSalario);
        edtNome = findViewById(R.id.edtNome);
        txtNome = findViewById(R.id.txtNome);
        txtDesconto = findViewById(R.id.txtDesconto);
        txtAuxilio = findViewById(R.id.txtAuxilio);
        txtSalarioL = findViewById(R.id.txtSalarioL);
        btnProximo = findViewById(R.id.btnProximo);
        btnVoltar = findViewById(R.id.btnVoltar);

    }


    public void btnProximo(View view) {

        txtNomeFunc = edtNome.getText().toString();
        Intent intent = new Intent(this, activitydois.class);
        intent.putExtra("funcionario", txtNomeFunc);

        int salario1 = Integer.parseInt(edtSalario.getText().toString());
        intent.putExtra("salario", txtSalarioFunc);

        startActivity(intent);


        if (salario1 <=1000){
            txtSalarioL.setText(String.valueOf(salario1 - (100 * 7 / salario1) + 120));
            txtDesconto.setText("7%");
            txtAuxilio.setText("SIM");
        }
        if (salario1 >=1001 && salario1<2000){
            txtSalarioL.setText(String.valueOf(salario1 - (100 * 10 / salario1)));
            txtDesconto.setText("10%");
            txtAuxilio.setText("NÃO");
        }
        else{
            txtSalarioL.setText(salario1 - (100 * 15 / salario1));
            txtDesconto.setText("15%");
            txtAuxilio.setText("NÃO");
        }
    }
}