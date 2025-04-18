using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
// referencia o mysql
using MySql.Data.MySqlClient;

namespace BD_Consulta_17_04
{
    public partial class frmCategoria : Form
    {
        public frmCategoria()
        {
            InitializeComponent();
        }

        // nova função
        private void fnListar()
        {
            // cria uma variável data adapter (retorna dados do banco) que tem o código que vai executar e onde vai executar
            MySqlDataAdapter oPesquisa = new MySqlDataAdapter("SELECT CTGCODIGO, CTGNOME FROM CATEGORIAS ORDER BY CTGCODIGO DESC", Form1.oConexao);

            // nova tabela de dados
            DataTable oDados = new DataTable();

            // passa o que foi encontrado pela pesquisa pros dados
            oPesquisa.Fill(oDados);

            // o grid view recebe os dados encontrados pela pesquisa
            grdCateg.DataSource = oDados;
        }
        private void cmdGravar_Click(object sender, EventArgs e)
        {
            // cria uma nova variável de um comando MySQL
            MySqlCommand oCmd = new MySqlCommand();

            // conecta o comando à string de conexão (Form1.cs)
            oCmd.Connection = Form1.oConexao;

            // define o comando da variável
            // - insere na tabela categorias no campo CTGNOME o valor de uma variável criada agora (com o @)
            oCmd.CommandText = "INSERT INTO CATEGORIAS (CTGNOME) VALUES (@cNome)";

            // A variável cNome recebe o valor do txtNome
            oCmd.Parameters.AddWithValue("@cNome", txtNome.Text);

            // executa o comando no banco de dados
            oCmd.ExecuteNonQuery();
            fnListar();
        }

        private void frmCategoria_Load(object sender, EventArgs e)
        {
            fnListar();
        }

        private void cmdExcluir_Click(object sender, EventArgs e)
        {
            // cria uma nova variável de um comando MySQL
            MySqlCommand oCmd = new MySqlCommand();

            // conecta o comando à string de conexão (Form1.cs)
            oCmd.Connection = Form1.oConexao;

            // define o comando da variável
            // - deleta da tabela categorias onde ctgcodigo é a variavel cCod criada agora
            oCmd.CommandText = "DELETE FROM CATEGORIAS WHERE CTGCODIGO = @cCod";

            // testa se uma linha foi seleciona. opcional
            if (grdCateg.SelectedRows.Count > 0)
            {
                // A variável cCod recebe a primeira posição do grid
                oCmd.Parameters.AddWithValue("@cCod", grdCateg.SelectedRows[0].Cells[0].Value);

                // executa o comando no banco de dados
                oCmd.ExecuteNonQuery();
                fnListar();
            }
        }
    }
}