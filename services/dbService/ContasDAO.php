<?php
namespace dbService;
use \dbService\SqlCommandException;
use \PDO;
use \Slim\Container;

class ContasDAO
{
    private $connector;
    function __construct(Container $c=null)
    {
        $this->connector = $c['dbService\connService'];
    }
    public function getAllContas()
    {
        $sql = "
                SELECT [AGENCIA_DESTINO]
                    ,[OPERACAO_DESTINO]
                    ,[CONTA_DESTINO]
                    ,[DV_DESTINO]
                    ,[AGENCIA_ORIGEM]
                    ,[OPERACAO_ORIGEM]
                    ,[CONTA_ORIGEM]
                    ,[DV_ORIGEM]
                    /*,[NOME_TITULAR_1]
                    ,[CPF_CNPJ_TITULAR_1]
                    ,[ABERTAS_EM]
                    ,[ISENCAO_CESTA_DC36_CONTA_DESTINO]
                    ,[DATA_ISENCAO_CESTA_DC36_CONTA_DESTINO]
                    ,[ENCERRAR_CONTA_ABERTA_EM_LOTE]
                    ,[DATA_ENCERRAMENTO_CONTA_DESTINO]
                    ,[DATA_SOLICITACAO_ENCERRAMENTO_CONTA_ABERTA_EM_LOTE]
                    ,[ENCERRAR_CONTA_ORIGEM]
                    ,[DATA_SOLICITACAO_ENCERRAMENTO_CONTA_ORIGEM]
                    ,[DATA_ENCERRAMENTO_CONTA_ORIGEM]
                    ,[ASSINATURA_DO_TERMO]
                    ,[DATA_INCLUSAO_TERMO]
                    ,[NOME_AGENCIA_DESTINO]
                    ,[CNPJ_SR_DESTINO]
                    ,[NOME_SR_DESTINO]
                    ,[CNPJ_DIRE_DESTINO]
                    ,[NOME_DIRE_DESTINO]
                    ,[NOME_AGENCIA_ORIGEM]
                    ,[CNPJ_SR_ORIGEM]
                    ,[NOME_SR_ORIGEM]
                    ,[CNPJ_DIRE_ORIGEM]
                    ,[NOME_DIRE_ORIGEM]
                    ,[QUANTIDADE_REPRESENTANTES]
                    ,[MARCA_1]
                    ,[MARCA_2]
                    ,[MARCA_3]
                    ,[MARCA_4]
                    ,[MARCA_5]
                    ,[MARCA_6]
                    ,[MARCA_7]
                    ,[MARCA_8]
                    ,[MARCA_9]
                    ,[MARCA_10]
                    ,[MARCA_11]
                    ,[MARCA_12]
                    ,[MARCA_13]
                    ,[MARCA_14]
                    ,[MARCA_15]
                    ,[MARCA_16]
                    ,[MARCA_17]
                    ,[MARCA_18]
                    ,[MARCA_19]
                    ,[MARCA_20]
                    ,[MARCA_21]
                    ,[MARCA_22]
                    ,[MARCA_23]
                    ,[MARCA_24]
                    ,[MARCA_25]
                    ,[MARCA_26]
                    ,[MARCA_27]
                    ,[MARCA_28]
                    ,[MARCA_29]
                    ,[MARCA_30]
                    ,[nome_arquivo_termo]
                    ,[DATA_CONFORMIDADE]
                    ,[ultimo_log_termo]
                    ,[LOTE_ID]
                    ,[DATA_INCLUSAO_OUTROS_TERMOS]
                    ,[NOME_ARQUIVO_OUTROS_TERMOS]
                    ,[data_ultima_movimentacao]
                    ,[CERTO_PRIMEIRA_VEZ]
                    ,[CONFORME]
                    ,[DATA_ULTIMA_ANALISE_CONFORMIDADE]
                    ,[QUANTIDADE_ANALISE_CONFORMIDADE]*/
                FROM [dbo].[contas]
        ";
        $stmt = $this->connector->prepare($sql);
        try {
            $stmt->execute();
        } catch (\Exception $e) {
            throw new SqlCommandException($e);
        }
        while($row = $stmt->fetch(PDO::FETCH_NUM))
        {
            yield $row;
        }
    }
}
?>